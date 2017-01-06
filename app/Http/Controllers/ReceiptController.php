<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptRequest;
use App\Office;
use App\Quote;
use App\Receipt;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the Receipt.
     */
    public function index()
    {

        $accounts = $this->organization->accounts;

        $noQuote = true;
        $noReceipt = true;
        $receiptCounter = 0;

        foreach ($accounts as $account) {
            if ($account->quotes->count() > 0) {
                $noQuote = false;

                foreach($account->quotes as $quote) {
                    if ($quote->receipt) {
                        $noReceipt = false;
                        $receiptCounter++;
                    }
                }
            }
        }

        return view('pages.receipts.index')->with(compact('accounts', 'noQuote', 'noReceipt', 'receiptCounter'));
    }

    /**
     * Show the form for creating a new Receipt.
     */
    public function create($id)
    {

        $office = Office::findOrFail($id);
        $quotes = $office->quotes;

        return view('pages.receipts.create')->with('quotes', $quotes);
    }

    /**
     * Store a newly created Receipt in storage.
     */

    public function store($id)
    {

        $quote = Quote::findOrFail($id);

        $receipt = [

            "topic" => $quote->topic,
            "supplier" => $quote->office->name,
            "delivery_deadline" => $quote->deadline,
            "description" => $quote->description,
            "special_conditions" => $quote->special_conditions,
            "content" => $quote->content

        ];

        if ($receipt = Receipt::create($receipt)) {

            $receipt->quote()->associate($quote);
            $receipt->save();
            Flash::success(Lang::get('app.general:create-success'));

        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(action('receipt.create'));

        }

        return redirect(action('ReceiptController@index'));
    }

    /**
     * Display the specified Receipt.
     */
    public function show($id)
    {

        $receipt = Receipt::findOrFail($id);

        if (empty($receipt)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('ReceiptController@index'));
        }

        return view('pages.receipts.show')->with('receipt', $receipt);
    }

    /**
     * Show the form for editing the specified Receipt.
     */
    public function edit($id)
    {
        $receipt = Receipt::findOrFail($id);

        if (empty($receipt)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('ReceiptController@index'));
        }

        return view('pages.receipts.edit')->with('receipt', $receipt);
    }

    /**
     * Update the specified Receipt in storage.
     */
    public function update($id, ReceiptRequest $request)
    {
        $receipt = Receipt::findOrFail($id);
        $data = $request->all();

        if (empty($receipt)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('ReceiptController@index'));
        }

        if ($receipt->update($data) && $receipt->save()) {

            Flash::success(Lang::get('app.general:update-success'));

        } else {

            Flash::error(Lang::get('app.general:update-failed'));
            return redirect(action('receipt.edit'));

        }

        return redirect(action('ReceiptController@index'));
    }

    /**
     * Remove the specified Receipt from storage.
     */
    public function destroy($id)
    {
        $receipt = Receipt::findOrFail($id);

        if (empty($receipt)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('ReceiptController@index'));
        }

        $receipt->delete();

        Flash::success(Lang::get('app.general:delete-success'));

        return redirect(action('ReceiptController@index'));
    }
}
