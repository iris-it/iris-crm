<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Tax;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductController extends InfyOmBaseController
{
    /** @var  ProductRepository */
    private $productsRepository;

    public function __construct(ProductRepository $productsRepo)
    {
        $this->productsRepository = $productsRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productsRepository->pushCriteria(new RequestCriteria($request));
        $products = $this->productsRepository->all();

        return view('pages.products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        $contacts = Contact::all();
        $taxes = Tax::all();

        return view('pages.products.create')->with(compact('contacts', 'taxes'));
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        $products = $this->productsRepository->create($input);

        Flash::success('Product saved successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $products = $this->productsRepository->findWithoutFail($id);

        if (empty($products)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('pages.products.show')->with('products', $products);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $products = $this->productsRepository->findWithoutFail($id);
        $contacts = Contact::all();
        $taxes = Tax::all();

        if (empty($products)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('pages.products.edit')->with(compact('products', 'contacts', 'taxes'));
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $products = $this->productsRepository->findWithoutFail($id);

        if (empty($products)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $products = $this->productsRepository->update($request->all(), $id);

        Flash::success('Product updated successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $products = $this->productsRepository->findWithoutFail($id);

        if (empty($products)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $this->productsRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }
}
