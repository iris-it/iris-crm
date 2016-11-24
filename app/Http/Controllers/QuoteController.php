<?php

namespace App\Http\Controllers;

use App\Account;
use App\Contact;
use App\Http\Requests\QuoteRequest;
use App\Office;
use App\Product;
use App\Quote;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class QuoteController extends Controller
{

    /**
     * Display a listing of the Quote.
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

        return view('pages.quotes.index')->with(compact('accounts', 'leads', 'noQuote', 'accountsList'));
    }

    /**
     * Show the form for creating a new Quote.
     */
    public function create(Request $request)
    {

        $account_id = $request->get('account_id');

        if (!Account::find($account_id)) {
            return abort(403, 'unauthorized');
        }

        $account = Account::findOrFail($account_id);

        $offices = $account->offices->pluck('name', 'id');

        if ($offices->count() === 0) {
            Flash::error(Lang::get('app.general:missing-office'));
            return redirect(action('AccountController@show', $account_id));
        }

        $products = $this->organization->products;
        $services = $this->organization->services;

        return view('pages.quotes.create')->with(compact('offices', 'products', 'services'));
    }

    /**
     * Store a newly created Quote in storage.
     */
    public function store(QuoteRequest $request)
    {

        $input = $request->all();

        if ($quote = Quote::create($input)) {

            $office = Office::findOrFail($request->office_id);
            $quote->office()->associate($office);

            $htPrice = 0;
            $price = 0;

            // Serialize

//            foreach ($request->products as $product) {
//
//                $totalTaxes = 0;
//
//                $product = Product::findOrFail($product->id);
//
//                foreach ($product->taxes as $tax) {
//
//                    if ($tax->is_active) {
//                        $totalTaxes = $totalTaxes + ($product->ht_price * ($tax->value / 100));
//                    }
//                }
//
//                $productHtPrice = $product->ht_price;
//                $htPrice = $htPrice + $productHtPrice;
//
//                $productPrice = $product->ht_price + $totalTaxes;
//                $price = $price + $productPrice;
//
//            }
//
//            foreach ($request->services as $service) {
//
//                $totalTaxes = 0;
//
//                $service = Service::findOrFail($service->id);
//
//                foreach ($service->taxes as $tax) {
//
//                    if ($tax->is_active) {
//                        $totalTaxes = $totalTaxes + ($service->ht_price * ($tax->value / 100));
//                    }
//                }
//
//                $serviceHtPrice = $service->ht_price;
//                $servicePrice = $service->ht_price + $totalTaxes;
//
//                $htPrice = $htPrice + $serviceHtPrice;
//                $price = $price + $servicePrice;
//
//            }
//

            $quote->ht_price = $htPrice;
            $quote->ttc_price = $price;
            $quote->save();


            Flash::success(Lang::get('app.general:create-success'));

        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(action('QuoteController@create'));

        }

        return redirect(action('QuoteController@index'));
    }

    /**
     * Display the specified Quote.
     */
    public function show($id)
    {

        $quote = Quote::findOrFail($id);

        if (empty($quote)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('QuoteController@index'));
        }

        return view('pages.quotes.show')->with('quote', $quote);
    }

    /**
     * Show the form for editing the specified Quote.
     */
    public function edit($id)
    {
        $quote = Quote::findOrFail($id);

        $offices = $quote->office->account->offices->pluck('name', 'id');
        $products = $this->organization->products;
        $services = $this->organization->services;

        if (empty($quote)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('QuoteController@index'));
        }

        return view('pages.quotes.edit')->with(compact('quote', 'offices', 'products', 'services'));
    }

    /**
     * Update the specified Quote in storage.
     */
    public function update($id, QuoteRequest $request)
    {
        $quote = Quote::findOrFail($id);
        $input = $request->all();

        if (empty($quote)) {
            Flash::error(Lang::get('app.general:missing-model'));
            return redirect(action('QuoteController@index'));
        }

        if ($quote->update($input) && $quote->save()) {

            $htPrice = 0;
            $price = 0;

            $office = Office::findOrFail($request->office_id);
            $quote->office()->associate($office);

//            if (!$request->has('products')) {
//                $input["products"] = [];
//            } else if (!$request->has('services')) {
//                $input["services"] = [];
//            }

            // Serialize

//            foreach ($request->products as $product) {
//
//                $totalTaxes = 0;
//                $product = Product::findOrFail($product->id);
//
//                foreach ($product->taxes as $tax) {
//
//                    if ($tax->is_active) {
//                        $totalTaxes = $totalTaxes + ($product->ht_price * ($tax->value / 100));
//                    }
//                }
//
//                $productHtPrice = $product->ht_price;
//                $htPrice = $htPrice + $productHtPrice;
//
//                $productPrice = $product->ht_price + $totalTaxes;
//                $price = $price + $productPrice;
//
//            }
//
//            foreach ($request->services as $service) {
//
//                $totalTaxes = 0;
//                $service = Service::findOrFail($service->id);
//
//                foreach ($service->taxes as $tax) {
//
//                    if ($tax->is_active) {
//
//                        $totalTaxes = $totalTaxes + ($service->ht_price * ($tax->value / 100));
//                    }
//                }
//
//                $serviceHtPrice = $service->ht_price;
//                $servicePrice = $service->ht_price + $totalTaxes;
//
//                $htPrice = $htPrice + $serviceHtPrice;
//                $price = $price + $servicePrice;
//
//            }

            $quote->ht_price = $htPrice;
            $quote->ttc_price = $price;
            $quote->save();

            Flash::success(Lang::get('app.general:update-success'));

        } else {

            Flash::error(Lang::get('app.general:update-failed'));
            return redirect(action('quote.edit'));

        }

        return redirect(action('QuoteController@index'));
    }

    /**
     * Remove the specified Quote from storage.
     */
    public function destroy($id)
    {
        $quote = Quote::findOrFail($id);

        if (empty($quote)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('QuoteController@index'));
        }

        $quote->delete();

        Flash::success(Lang::get('app.general:delete-success'));

        return redirect(action('QuoteController@index'));
    }
}
