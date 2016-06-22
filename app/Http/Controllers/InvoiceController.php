<?php

namespace App\Http\Controllers;

use App\Account;
use App\Contact;
use App\Http\Requests;
use App\Http\Requests\CreateInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Quote;
use App\Repositories\InvoiceRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\User;
use Illuminate\Http\Request;
use Flash;
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
        $contacts = Contact::lists('firstname' . 'lastname', 'id');
        $accounts = Account::lists('name', 'id');
        $quotes = Quote::lists('name', 'id');

        return view('pages.invoices.create')->with(compact('contacts', 'accounts', 'quotes'));
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
            $quote = Quote::findOrFail($request->quote_id);

            $invoice->contact()->associate($contact);
            $invoice->account()->associate($account);
            $invoice->quote()->associate($quote);

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

        $contacts = Contact::lists('firstname' . 'lastname', 'id');
        $accounts = Account::lists('name', 'id');
        $quotes = Quote::lists('name', 'id');

        if (empty($invoice)) {
            Flash::error('Invoice not found');

            return redirect(route('invoices.index'));
        }

        return view('pages.invoices.edit')->with(compact('invoice', 'contacts', 'accounts', 'quotes'));
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

        if (empty($invoice)) {

            Flash::error('Invoice not found');
            return redirect(route('invoices.index'));
        }

        if ($invoice = $this->invoiceRepository->update($request->all(), $id)) {

            $contact = Contact::findOrFail($request->contact_name_id);
            $account = Account::findOrFail($request->account_name_id);
            $quote = Quote::findOrFail($request->quote_id);

            $invoice->contact()->associate($contact);
            $invoice->account()->associate($account);
            $invoice->quote()->associate($quote);

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
