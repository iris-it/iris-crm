<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('hasOrganization');

        $this->organization = Auth::user()->organization;
    }

    /**
     * Display a listing of the Product.
     */
    public function index()
    {
        $products = $this->organization->products;
        return view('pages.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new Product.
     */
    public function create()
    {
        $contacts = $this->organization->contacts;
        $taxes = $this->organization->taxes;


        return view('pages.products.create')->with(compact('contacts', 'taxes'));
    }

    /**
     * Store a newly created Product in storage.
     */
    public function store(ProductRequest $request)
    {
        $input = $request->all();

        if ($product = Product::create($input)) {

            $totalTaxes = 0;

            $contact = Contact::findOrFail($request->manutention_officer_id);
            $product->officer = $contact->firstname . " " . $contact->lastname;
            $product->taxes()->sync($input["taxes"] ?: []);

            foreach ($product->taxes as $tax) {

                if ($tax->is_active) {
                    $totalTaxes = $totalTaxes + ($product->ht_price * ($tax->value / 100));
                }
            }

            $product->ttc_price = $product->ht_price + $totalTaxes;
            $product->save();

            Flash::success(Lang::get('app.general:create-success'));

        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(route('products.create'));

        }

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        if (empty($product)) {

            Flash::error(Lang::get('app.general:missing-model'));
            return redirect(route('products.index'));
        }

        return view('pages.products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $contacts = $this->organization->contacts;
        $taxes = $this->organization->taxes;

        if (empty($product)) {

            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(route('products.index'));
        }

        return view('pages.products.edit')->with(compact('product', 'contacts', 'taxes'));
    }

    /**
     * Update the specified Product in storage.
     */
    public function update($id, ProductRequest $request)
    {
        $product = Product::findOrFail($id);
        $input = $request->all();
        $totalTaxes = 0;

        $contact = Contact::findOrFail($request->manutention_officer_id);

        if (empty($product)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(route('products.index'));
        }

        if ($product->update($input) && $product->save()) {

            if (!$request->has('taxes')) {
                $input["taxes"] = [];
            }

            $product->taxes()->sync($input["taxes"] ?: []);
            $product->officer = $contact->firstname . " " . $contact->lastname;

            foreach ($product->taxes as $tax) {

                if ($tax->is_active) {
                    $totalTaxes = $totalTaxes + ($product->ht_price * ($tax->value / 100));
                }
            }

            $product->ttc_price = $product->ht_price + $totalTaxes;
            $product->save();

            Flash::success(Lang::get('app.general:update-success'));

        } else {
            Flash::error(Lang::get('app.general:update-failed'));
            return redirect(route('products.edit'));

        }


        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if (empty($product)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(route('products.index'));
        }

        $product->delete();

        Flash::success(Lang::get('app.general:delete-success'));

        return redirect(route('products.index'));
    }
}
