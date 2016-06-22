<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Repositories\QuoteRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
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
        $contacts = Contact::lists('firstname' . 'lastname', 'id');
        $accounts = Account::lists('name', 'id');
        $users = User::lists('name', 'id');

        return view('pages.quotes.create')->with(compact('contacts', 'accounts', 'users'));
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

            $quote->user()->associate($user);
            $quote->contact()->associate($contact);
            $quote->account()->associate($account);

            $quote->save();

            Flash::success(Lang::get('app.general:create-success'));

        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(route('quote.create'));

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

        $contacts = Contact::lists('firstname' . 'lastname', 'id');
        $accounts = Account::lists('name', 'id');
        $users = User::lists('name', 'id');

        if (empty($quote)) {
            Flash::error('Quote not found');

            return redirect(route('quotes.index'));
        }

        return view('pages.quotes.edit')->with(compact('quote', 'contacts', 'accounts', 'users'));
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

        if (empty($quote)) {
            Flash::error('Quote not found');

            return redirect(route('quotes.index'));
        }

        if ($quote = $this->quoteRepository->update($request->all(), $id)) {

            $user = User::findOrFail($request->quote_owner_id);
            $contact = Contact::findOrFail($request->contact_name_id);
            $account = Account::findOrFail($request->account_name_id);

            $quote->user()->associate($user);
            $quote->contact()->associate($contact);
            $quote->account()->associate($account);

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
