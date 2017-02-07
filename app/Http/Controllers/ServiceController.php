<?php

namespace App\Http\Controllers;


use App\Http\Requests\ServiceRequest;
use App\Service;
use App\Services\ImageService;
use App\Tax;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class ServiceController extends Controller
{

    /**
     * Display a listing of the Service.
     */
    public function index()
    {
        $services = $this->organization->services;
        return view('pages.services.index')->with('services', $services);
    }

    /**
     * Show the form for creating a new Service.
     */
    public function create()
    {
        $vat = Tax::where('organization_id', $this->organization->id)->OnlyVat()->IsActive()->get();
        $taxes = Tax::where('organization_id', $this->organization->id)->MixedTaxes()->IsActive()->get();

        return view('pages.services.create')->with(compact('taxes', 'vat'));
    }

    /**
     * Store a newly created Service in storage.
     */
    public function store(ServiceRequest $request, ImageService $imageService)
    {
        $input = $request->all();

        if ($request->file('service_avatar')) {
            $filename = $imageService->processTo('services/', $request, 'service_avatar');
            $input['service_avatar'] = $filename;
        }

        if ($service = Service::create($input)) {

            $totalTaxes = 0;

            if ($input["vat"] !== "") {
                $vat = Tax::findOrFail($input["vat"]);

                $service->vat()->associate($vat);

                $totalTaxes = $totalTaxes + ($service->ht_price * ($vat->value / 100));
            } else {
                $service->vat()->dissociate();
            }

            $service->taxes()->sync($input["taxes"] ?: []);
            foreach ($service->taxes as $tax) {
                if ($tax->is_active) {
                    $totalTaxes = $totalTaxes + ($service->ht_price * ($tax->value / 100));
                }
            }

            $service->ttc_price = $service->ht_price + $totalTaxes;
            $service->organization()->associate($this->organization);
            $service->save();


            Flash::success(Lang::get('app.general:create-success'));

        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(action('ServiceController@create'));

        }

        return redirect(action('ServiceController@index'));
    }

    /**
     * Display the specified Service.
     *
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);

        if (empty($service)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('ServiceController@index'));
        }

        return view('pages.services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified Service.
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);

        $vat = Tax::where('organization_id', $this->organization->id)->OnlyVat()->IsActive()->get();
        $taxes = Tax::where('organization_id', $this->organization->id)->MixedTaxes()->IsActive()->get();


        if (empty($service)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('ServiceController@index'));
        }

        return view('pages.services.edit')->with(compact('service', 'taxes', 'vat'));
    }

    /**
     * Update the specified Service in storage.
     */
    public function update($id, ServiceRequest $request, ImageService $imageService)
    {
        $input = $request->all();
        $service = Service::findOrFail($id);
        $totalTaxes = 0;

        if ($request->file('service_avatar')) {
            $filename = $imageService->processTo('services/', $request, 'service_avatar');
            $input['service_avatar'] = $filename;
        }

        if (empty($service)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('ServiceController@index'));
        }

        if ($service->update($input) && $service->save()) {

            if ($input["vat"] !== "") {
                $vat = Tax::findOrFail($input["vat"]);

                $service->vat()->associate($vat);

                $totalTaxes = $totalTaxes + ($service->ht_price * ($vat->value / 100));
            } else {
                $service->vat()->dissociate();
            }

            if (!$request->has('taxes')) {
                $input["taxes"] = [];
            }

            $service->taxes()->sync($input["taxes"] ?: []);

            foreach ($service->taxes as $tax) {

                if ($tax->is_active) {
                    $totalTaxes = $totalTaxes + ($service->ht_price * ($tax->value / 100));
                }
            }

            $service->ttc_price = $service->ht_price + $totalTaxes;
            $service->save();


            Flash::success(Lang::get('app.organization:update-success'));

        } else {

            Flash::error(Lang::get('app.organization:update-failed'));
            return redirect(action('ServiceController@edit'));

        }

        return redirect(action('ServiceController@index'));
    }

    /**
     * Remove the specified Service from storage.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        if (empty($service)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('ServiceController@index'));
        }

        $service->delete();

        Flash::success(Lang::get('app.general:delete-success'));

        return redirect(action('ServiceController@index'));
    }
}
