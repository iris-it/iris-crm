<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptRequest;
use App\Office;
use App\Receipt;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the Order.
     */
    public function index()
    {

        $accountsAndLeads = $this->organization->accounts;
        $accounts = $this->organization->accounts()->where('is_lead', false)->get();
        $leads = $this->organization->accounts()->where('is_lead', true)->get();
        $noQuote = true;

        foreach ($accountsAndLeads as $account) {
            if ($account->quotes->count() > 0) {
                $noQuote = false;
            }
        }

        $account_list = $accounts->pluck('name', 'id')->toArray();
        $lead_list = $leads->pluck('name', 'id')->toArray();

        $accountsList = [
            trans('app.general:accounts') => $account_list,
            trans('app.general:leads') => $lead_list
        ];

        return view('pages.receipts.index')->with(compact('accounts', 'leads', 'noQuote', 'accountsList'));
    }

    /**
     * Show the form for creating a new Order.
     */
    public function create($id)
    {

        $office = Office::findOrFail($id);
        $quotes = $office->quotes;

        return view('pages.receipts.create')->with('quotes', $quotes);
    }

    /**
     * Store a newly created Order in storage.
     */

    public function store(ReceiptRequest $request)
    {
        $input = $request->all();


        if ($receipt = Receipt::create($input)) {

            $quote = Quote::findOrFail($request->quote_id);
            $receipt->quote()->associate($quote);
            $receipt->save();
            Flash::success(Lang::get('app.general:create-success'));

        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(action('order.create'));

        }

        return redirect(action('OrderController@index'));
    }

    /**
     * Display the specified Order.
     */
    public function show($id)
    {

        $receipt = Receipt::findOrFail($id);

        if (empty($order)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('OrderController@index'));
        }

        return view('pages.receipts.show')->with('receipt', $receipt);
    }

    /**
     * Show the form for editing the specified Order.
     */
    public function edit($id)
    {
        $receipt = Receipt::findOrFail($id);

        if (empty($order)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('OrderController@index'));
        }

        return view('pages.receipts.edit')->with('receipt', $receipt);
    }

    /**
     * Update the specified Order in storage.
     */
    public function update($id, ReceiptRequest $request)
    {
        $receipt = Receipt::findOrFail($id);
        $data = $request->all();

        if (empty($order)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('OrderController@index'));
        }

        if ($receipt->update($data) && $receipt->save()) {

            Flash::success(Lang::get('app.general:update-success'));

        } else {

            Flash::error(Lang::get('app.general:update-failed'));
            return redirect(action('order.edit'));

        }

        return redirect(action('OrderController@index'));
    }

    /**
     * Remove the specified Order from storage.
     */
    public function destroy($id)
    {
        $receipt = Receipt::findOrFail($id);

        if (empty($order)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('OrderController@index'));
        }

        $receipt->delete();

        Flash::success(Lang::get('app.general:delete-success'));

        return redirect(action('OrderController@index'));
    }
}
