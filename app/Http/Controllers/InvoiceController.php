<?php

namespace App\Http\Controllers;

use App\Account;
use App\Contact;
use App\Http\Requests;
use App\Http\Requests\CreateInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Product;
use App\Quote;
use App\Repositories\InvoiceRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class InvoiceController extends InfyOmBaseController
{
    /** @var  InvoiceRepository */
    private $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepo)
    {
        $this->invoiceRepository = $invoiceRepo;
    }

    /**
     * Display a listing of the Invoice.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->invoiceRepository->pushCriteria(new RequestCriteria($request));
        $invoices = $this->invoiceRepository->all();

        return view('pages.invoices.index')
            ->with('invoices', $invoices);
    }

    /**
     * Show the form for creating a new Invoice.
     *
     * @return Response
     */
    public function create()
    {
        $contacts = Contact::pluck('lastname', 'id');
        $accounts = Account::pluck('name', 'id');
        $quotes = Quote::pluck('topic', 'id');
        $quotes->prepend("Aucun", 0);
        $products = Product::pluck('product_name', 'id');
        $services = Service::pluck('service_name', 'id');


        return view('pages.invoices.create')->with(compact('contacts', 'accounts', 'quotes', 'services', 'products'));
    }

    /**
     * Store a newly created Invoice in storage.
     *
     * @param CreateInvoiceRequest $request
     *
     * @return Response
     */
    public function store(CreateInvoiceRequest $request)
    {
        $input = $request->all();


        if ($invoice = $this->invoiceRepository->create($input)) {

            $contact = Contact::findOrFail($request->contact_name_id);
            $account = Account::findOrFail($request->account_name_id);
            $htPrice = 0;
            $price = 0;


            $invoice->contact()->associate($contact);
            $invoice->account()->associate($account);

            if ($request->has('quote_id') && $request->quote_id != 0) {

                $quote = Quote::findOrFail($request->quote_id);
                $productsArray = [];
                $servicesArray = [];

                $invoice->quote()->associate($quote);
                $invoice->converted = true;

                foreach ($quote->products as $product) {

                    $productsArray[] = $product->id;
                }

                foreach ($quote->services as $service) {

                    $servicesArray[] = $service->id;
                }
                $invoice->products()->sync($productsArray ?: []);
                $invoice->services()->sync($servicesArray ?: []);

            } else {
                $invoice->converted = false;
                $invoice->products()->sync($input["products"] ?: []);
                if(empty($input["services"])) {
                    $input["services"] = [];
                }
                $invoice->services()->sync($input["services"] ?: []);

            }

            $invoice->save();

            foreach ($invoice->products as $product) {
                $productPrice = 0;
                $productHtPrice = 0;

                $totalTaxes = 0;
                foreach ($product->taxes as $tax) {

                    if ($tax->is_active) {
                        $totalTaxes = $totalTaxes + ($product->ht_price * ($tax->value / 100));
                    }
                }

                $productHtPrice = $product->ht_price;
                $htPrice = $htPrice + $productHtPrice;

                $productPrice = $product->ht_price + $totalTaxes;
                $price = $price + $productPrice;

            }

            foreach ($invoice->services as $service) {
                $servicePrice = 0;
                $totalTaxes = 0;
                foreach ($service->taxes as $tax) {

                    if ($tax->is_active) {
                        $totalTaxes = $totalTaxes + ($service->ht_price * ($tax->value / 100));
                    }
                }

                $serviceHtPrice = $service->ht_price;
                $servicePrice = $service->ht_price + $totalTaxes;

                $htPrice = $htPrice + $serviceHtPrice;
                $price = $price + $servicePrice;

            }

            $invoice->ht_price = $htPrice;
            $invoice->ttc_price = $price;
            $invoice->save();

            Flash::success(Lang::get('app.general:create-success'));

        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(route('invoices.create'));

        }


        return redirect(route('invoices.index'));
    }

    /**
     * Display the specified Invoice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $invoice = $this->invoiceRepository->findWithoutFail($id);

        if (empty($invoice)) {
            Flash::error('Invoice not found');

            return redirect(route('invoices.index'));
        }

        return view('pages.invoices.show')->with('invoice', $invoice);
    }

    /**
     * Show the form for editing the specified Invoice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $invoice = $this->invoiceRepository->findWithoutFail($id);

        $contacts = Contact::pluck('lastname', 'id');
        $accounts = Account::pluck('name', 'id');
        $quotes = Quote::pluck('topic', 'id');
        $quotes->prepend("Aucun", 0);
        $products = Product::pluck('product_name', 'id');
        $services = Service::pluck('service_name', 'id');

        if (empty($invoice)) {
            Flash::error('Invoice not found');

            return redirect(route('invoices.index'));
        }

        return view('pages.invoices.edit')->with(compact('invoice', 'contacts', 'accounts', 'quotes', 'products', 'services'));
    }

    /**
     * Update the specified Invoice in storage.
     *
     * @param  int $id
     * @param UpdateInvoiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInvoiceRequest $request)
    {
        $invoice = $this->invoiceRepository->findWithoutFail($id);
        $input = $request->all();

        if (empty($invoice)) {

            Flash::error('Invoice not found');
            return redirect(route('invoices.index'));
        }

        if ($invoice = $this->invoiceRepository->update($request->all(), $id)) {

            $contact = Contact::findOrFail($request->contact_name_id);
            $account = Account::findOrFail($request->account_name_id);
            $htPrice = 0;
            $price = 0;


            if ($request->has('quote_id') && $request->quote_id != 0) {
                $quote = Quote::findOrFail($request->quote_id);
                $productsArray = [];
                $servicesArray = [];

                foreach ($quote->products as $product) {

                    $productsArray[] = $product->id;
                }

                foreach ($quote->services as $service) {

                    $servicesArray[] = $service->id;
                }

                $invoice->products()->sync($productsArray ?: []);
                $invoice->services()->sync($servicesArray ?: []);

                $invoice->quote()->associate($quote);
                $invoice->converted = true;


            } else {
                $invoice->quote()->dissociate();
                $invoice->converted = false;

                if (!$request->has('products')) {
                    $input["products"] = [];
                } else if (!$request->has('services')) {
                    $input["services"] = [];
                }

                $invoice->products()->sync($input["products"] ?: []);
                $invoice->services()->sync($input["services"] ?: []);
            }


            $invoice->contact()->associate($contact);
            $invoice->account()->associate($account);


            $invoice->save();

            foreach ($invoice->products as $product) {
                $productPrice = 0;
                $productHtPrice = 0;
                $totalTaxes = 0;
                foreach ($product->taxes as $tax) {

                    if ($tax->is_active) {
                        $totalTaxes = $totalTaxes + ($product->ht_price * ($tax->value / 100));
                    }
                }

                $productHtPrice = $product->ht_price;
                $htPrice = $htPrice + $productHtPrice;

                $productPrice = $product->ht_price + $totalTaxes;
                $price = $price + $productPrice;

            }

            foreach ($invoice->services as $service) {
                $servicePrice = 0;
                $serviceHtPrice = 0;
                $totalTaxes = 0;
                foreach ($service->taxes as $tax) {

                    if ($tax->is_active) {
                        $totalTaxes = $totalTaxes + ($service->ht_price * ($tax->value / 100));
                    }
                }

                $serviceHtPrice = $service->ht_price;
                $servicePrice = $service->ht_price + $totalTaxes;

                $htPrice = $htPrice + $serviceHtPrice;
                $price = $price + $servicePrice;

            }

            $invoice->ht_price = $htPrice;
            $invoice->ttc_price = $price;
            $invoice->save();

            Flash::success(Lang::get('app.general:update-success'));

        } else {

            Flash::error(Lang::get('app.general:update-failed'));
            return redirect(route('invoices.edit'));

        }

        return redirect(route('invoices.index'));
    }

    /**
     * Remove the specified Invoice from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $invoice = $this->invoiceRepository->findWithoutFail($id);

        if (empty($invoice)) {
            Flash::error('Invoice not found');

            return redirect(route('invoices.index'));
        }

        $this->invoiceRepository->delete($id);

        Flash::success('Invoice deleted successfully.');

        return redirect(route('invoices.index'));
    }
}
