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
    public function index($id)
    {

        $office = Office::findOrFail($id);
        $receipts = $office->receipts;

        return view('pages.orders.index')->with('receipts', $receipts);
    }

    /**
     * Show the form for creating a new Order.
     */
    public function create($id)
    {

        $office = Office::findOrFail($id);
        $quotes = $office->quotes;

        return view('pages.orders.create')->with('quotes', $quotes);
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

        return view('pages.orders.show')->with('receipt', $receipt);
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

        return view('pages.orders.edit')->with('receipt', $receipt);
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
