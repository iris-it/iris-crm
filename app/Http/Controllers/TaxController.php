<?php

namespace App\Http\Controllers;


use App\Http\Requests\TaxRequest;
use App\Tax;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;


class TaxController extends Controller
{

    /**
     * Display a listing of the Tax.
     */
    public function index()
    {
      $taxes = $this->organization->taxes;

        return view('pages.taxes.index')->with('taxes', $taxes);
    }

    /**
     * Show the form for creating a new Tax.
     */
    public function create()
    {
        return view('pages.taxes.create');
    }

    /**
     * Store a newly created Tax in storage.
     */
    public function store(TaxRequest $request)
    {
        $input = $request->all();

        if ($tax = Tax::create($input)) {

            Flash::success(Lang::get('app.general:create-success'));

        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(action('TaxController@create'));

        }

        return redirect(action('TaxController@index'));
    }

    /**
     * Display the specified Tax.
     */
    public function show($id)
    {
        $tax = Tax::findOrFail($id);

        if (empty($tax)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('TaxController@index'));
        }

        return view('pages.taxes.show')->with('tax', $tax);
    }

    /**
     * Show the form for editing the specified Tax.
     */
    public function edit($id)
    {
        $tax = Tax::findOrFail($id);

        if (empty($tax)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('TaxController@index'));
        }

        return view('pages.taxes.edit')->with(compact('tax'));
    }

    /**
     * Update the specified Tax in storage.
     */
    public function update($id, TaxRequest $request)
    {
        $tax = Tax::findOrFail($id);
        $data = $request->all();

        if (empty($tax)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('TaxController@index'));
        }

        if ($tax->update($data) && $tax->save()) {

            Flash::success(Lang::get('app.general:update-success'));

        } else {

            Flash::error(Lang::get('app.general:update-failed'));
            return redirect(action('TaxController@edit'));

        }

        return redirect(action('TaxController@index'));
    }

    /**
     * Remove the specified Tax from storage.
     */
    public function destroy($id)
    {
        $tax = Tax::findOrFail($id);

        if (empty($tax)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('TaxController@index'));
        }

        $tax->delete();

        Flash::success(Lang::get('app.general:delete-success'));

        return redirect(action('TaxController@index'));
    }
}
