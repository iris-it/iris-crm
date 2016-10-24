<?php

namespace App\Http\Controllers;

use App\Account;
use App\Contact;
use App\Http\Requests\QuoteRequest;
use App\Office;
use App\Product;
use App\Quote;
use App\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class QuoteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('hasOrganization');

        $this->organization = Auth::user()->organization;
    }

    /**
     * Display a listing of the Quote.
     */
    public function index($id)
    {
        $office = Office::findOrFail($id);
        $quotes = $office->quotes;

        return view('pages.quotes.index')->with('quotes', $quotes);
    }

    /**
     * Show the form for creating a new Quote.
     */
    public function create($id)
    {
        $office = Office::findOrFail($id);

        $contacts = $office->contacts;
        $products = $this->organization->products;
        $services = $this->organization->services;

        return view('pages.quotes.create')->with(compact('office', 'contacts','products', 'services'));
    }

    /**
     * Store a newly created Quote in storage.
     */
    public function store($id, QuoteRequest $request)
    {
        $input = $request->all();
        $office = Office::findOrFail($id);

        if ($quote = Quote::create($input)) {

            $htPrice = 0;
            $price = 0;
            $contact = Contact::findOrFail($request->contact_id);

            $quote->office()->associate($office);

            // Serialize

            foreach ($request->products as $product) {

                $totalTaxes = 0;

                $product = Product::findOrFail($product->id);

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

            foreach ($request->services as $service) {

                $totalTaxes = 0;

                $service = Service::findOrFail($service->id);

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
     */
    public function show($id)
    {

        $quote = Quote::findOrFail($id);

        if (empty($quote)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(route('quotes.index'));
        }

        return view('pages.quotes.show')->with('quote', $quote);
    }

    /**
     * Show the form for editing the specified Quote.
     */
    public function edit($id)
    {
        $quote = Quote::findOrFail($id);

        $offices = $this->organization->offices;
        $contacts = $this->organization->contacts;
        $products = $this->organization->products;
        $services = $this->organization->services;

        if (empty($quote)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(route('quotes.index'));
        }

        return view('pages.quotes.edit')->with(compact('quote', 'contacts', 'offices', 'products', 'services'));
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
            return redirect(route('quotes.index'));
        }

        if ($quote->update($input) && $quote->save()) {

            $htPrice = 0;
            $price = 0;
            $office = Office::findOrFail($request->office_id);
            $contact = Contact::findOrFail($request->contact_id);

            $quote->office()->associate($office);

            if (!$request->has('products')) {
                $input["products"] = [];
            } else if (!$request->has('services')) {
                $input["services"] = [];
            }

            // Serialize

            foreach ($request->products as $product) {

                $totalTaxes = 0;
                $product = Product::findOrFail($product->id);

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

            foreach ($request->services as $service) {

                $totalTaxes = 0;
                $service = Service::findOrFail($service->id);

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
     */
    public function destroy($id)
    {
        $quote = Quote::findOrFail($id);

        if (empty($quote)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(route('quotes.index'));
        }

        $quote->delete();

        Flash::success(Lang::get('app.general:delete-success'));

        return redirect(route('quotes.index'));
    }
}
