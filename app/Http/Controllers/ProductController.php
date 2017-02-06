<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Services\ImageService;
use App\Tax;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class ProductController extends Controller
{

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

        $tva = Tax::where('organization_id', $this->organization->id)->OnlyVat()->IsActive()->get();
        $taxes = Tax::where('organization_id', $this->organization->id)->MixedTaxes()->IsActive()->get();

        return view('pages.products.create')->with(compact('taxes', 'tva'));
    }

    /**
     * Store a newly created Product in storage.
     */
    public function store(ProductRequest $request, ImageService $imageService)
    {
        $input = $request->all();

        if ($request->file('product_avatar')) {
            $filename = $imageService->processTo('products/', $request, 'product_avatar');
            $input['product_avatar'] = $filename;
        }

        if ($product = Product::create($input)) {

            $totalTaxes = 0;

            $product->taxes()->sync($input["taxes"] ?: []);

            foreach ($product->taxes as $tax) {

                if ($tax->is_active) {
                    $totalTaxes = $totalTaxes + ($product->ht_price * ($tax->value / 100));
                }
            }

            $product->ttc_price = $product->ht_price + $totalTaxes;
            $product->organization()->associate($this->organization);
            $product->save();

            Flash::success(Lang::get('app.general:create-success'));

        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(action('ProductController@create'));

        }

        return redirect(action('ProductController@index'));
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
            return redirect(action('ProductController@index'));
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

        $tva = Tax::where('organization_id', $this->organization->id)->OnlyVat()->IsActive()->get();
        $taxes = Tax::where('organization_id', $this->organization->id)->MixedTaxes()->IsActive()->get();

        if (empty($product)) {

            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('ProductController@index'));
        }

        return view('pages.products.edit')->with(compact('product', 'taxes', 'tva'));
    }

    /**
     * Update the specified Product in storage.
     */
    public function update($id, ProductRequest $request, ImageService $imageService)
    {
        $product = Product::findOrFail($id);
        $input = $request->all();
        $totalTaxes = 0;

        if ($request->file('product_avatar')) {
            $filename = $imageService->processTo('products/', $request, 'product_avatar');
            $input['product_avatar'] = $filename;
        }

        if (empty($product)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('ProductController@index'));
        }

        if ($product->update($input) && $product->save()) {

            if (!$request->has('taxes')) {
                $input["taxes"] = [];
            }

            $product->taxes()->sync($input["taxes"] ?: []);

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
            return redirect(action('ProductController@edit'));

        }


        return redirect(action('ProductController@index'));
    }

    /**
     * Remove the specified Product from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if (empty($product)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('ProductController@index'));
        }

        $product->delete();

        Flash::success(Lang::get('app.general:delete-success'));

        return redirect(action('ProductController@index'));
    }
}
