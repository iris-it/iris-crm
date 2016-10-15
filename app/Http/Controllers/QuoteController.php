<?php

namespace App\Http\Controllers;

use App\Account;
use App\Contact;
use App\Http\Requests;
use App\Http\Requests\CreateQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Product;
use App\Repositories\QuoteRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class QuoteController extends InfyOmBaseController
{
    /** @var  QuoteRepository */
    private $quoteRepository;

    public function __construct(QuoteRepository $quoteRepo)
    {
        $this->quoteRepository = $quoteRepo;
    }

    /**
     * Display a listing of the Quote.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->quoteRepository->pushCriteria(new RequestCriteria($request));
        $quotes = $this->quoteRepository->all();

        return view('pages.quotes.index')
            ->with('quotes', $quotes);
    }

    /**
     * Show the form for creating a new Quote.
     *
     * @return Response
     */
    public function create()
    {
        $contacts = Contact::pluck('lastname', 'id');
        $accounts = Account::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        $products = Product::pluck('product_name', 'id');
        $services = Service::pluck('service_name', 'id');

        return view('pages.quotes.create')->with(compact('contacts', 'accounts', 'users', 'products', 'services'));
    }

    /**
     * Store a newly created Quote in storage.
     *
     * @param CreateQuoteRequest $request
     *
     * @return Response
     */
    public function store(CreateQuoteRequest $request)
    {
        $input = $request->all();

        if ($quote = $this->quoteRepository->create($input)) {

            $user = User::findOrFail($request->quote_owner_id);
            $contact = Contact::findOrFail($request->contact_name_id);
            $account = Account::findOrFail($request->account_name_id);
            $htPrice = 0;
            $price = 0;

            $quote->user()->associate($user);
            $quote->contact()->associate($contact);
            $quote->account()->associate($account);

            $quote->products()->sync($input["products"] ?: []);
            $quote->services()->sync($input["services"] ?: []);

            $quote->save();


            foreach ($quote->products as $product) {
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

            foreach ($quote->services as $service) {
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

            $quote->ht_price = $htPrice;
            $quote->ttc_price = $price;
            $quote->save();


            Flash::success(Lang::get('app.general:create-success'));

        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(route('quotes.create'));

        }

        return redirect(route('quotes.index'));
    }

    /**
     * Display the specified Quote.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quote = $this->quoteRepository->findWithoutFail($id);

        if (empty($quote)) {
            Flash::error('Quote not found');

            return redirect(route('quotes.index'));
        }

        return view('pages.quotes.show')->with('quote', $quote);
    }

    /**
     * Show the form for editing the specified Quote.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $quote = $this->quoteRepository->findWithoutFail($id);

        $contacts = Contact::pluck('lastname', 'id');
        $accounts = Account::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        $products = Product::pluck('product_name', 'id');
        $services = Service::pluck('service_name', 'id');

        if (empty($quote)) {
            Flash::error('Quote not found');

            return redirect(route('quotes.index'));
        }

        return view('pages.quotes.edit')->with(compact('quote', 'contacts', 'accounts', 'users', 'products', 'services'));
    }

    /**
     * Update the specified Quote in storage.
     *
     * @param  int $id
     * @param UpdateQuoteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuoteRequest $request)
    {
        $quote = $this->quoteRepository->findWithoutFail($id);
        $input = $request->all();

        if (empty($quote)) {
            Flash::error('Quote not found');

            return redirect(route('quotes.index'));
        }

        if ($quote = $this->quoteRepository->update($request->all(), $id)) {

            $user = User::findOrFail($request->quote_owner_id);
            $contact = Contact::findOrFail($request->contact_name_id);
            $account = Account::findOrFail($request->account_name_id);
            $htPrice = 0;
            $price = 0;
            
            $quote->user()->associate($user);
            $quote->contact()->associate($contact);
            $quote->account()->associate($account);

            if (!$request->has('products')) {
                $input["products"] = [];
            } else if (!$request->has('services')) {
                $input["services"] = [];
            }

            $quote->products()->sync($input["products"] ?: []);
            $quote->services()->sync($input["services"] ?: []);

            $quote->save();

            foreach ($quote->products as $product) {
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

            foreach ($quote->services as $service) {
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

            $quote->ht_price = $htPrice;
            $quote->ttc_price = $price;
            $quote->save();

            Flash::success(Lang::get('app.general:update-success'));

        } else {

            Flash::error(Lang::get('app.general:update-failed'));
            return redirect(route('quote.edit'));

        }

        return redirect(route('quotes.index'));
    }

    /**
     * Remove the specified Quote from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quote = $this->quoteRepository->findWithoutFail($id);

        if (empty($quote)) {
            Flash::error('Quote not found');

            return redirect(route('quotes.index'));
        }

        $this->quoteRepository->delete($id);

        Flash::success('Quote deleted successfully.');

        return redirect(route('quotes.index'));
    }
}
