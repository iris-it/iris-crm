<?php

namespace App\Http\Controllers;


use App\Http\Requests\ServiceRequest;
use App\Service;
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
        $taxes = $this->organization->taxes;

        return view('pages.services.create')->with(compact('taxes'));
    }

    /**
     * Store a newly created Service in storage.
     */
    public function store(ServiceRequest $request)
    {
        $input = $request->all();
        $totalTaxes = 0;

        if ($service = Service::create($input)) {

            $service->taxes()->sync($input["taxes"] ?: []);
            $service->save();

            foreach ($service->taxes as $tax) {

                if ($tax->is_active) {
                    $totalTaxes = $totalTaxes + ($service->ht_price * ($tax->value / 100));
                }
            }

            $service->ttc_price = $service->ht_price + $totalTaxes;
            $service->save();


            Flash::success(Lang::get('app.general:create-success'));

        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(route('services.create'));

        }

        return redirect(route('services.index'));
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

            return redirect(route('services.index'));
        }

        return view('pages.services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified Service.
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $taxes = $this->organization->taxes;


        if (empty($service)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(route('services.index'));
        }

        return view('pages.services.edit')->with(compact('service', 'taxes'));
    }

    /**
     * Update the specified Service in storage.
     */
    public function update($id, ServiceRequest $request)
    {
        $input = $request->all();
        $service = Service::findOrFail($id);
        $totalTaxes = 0;

        if (empty($service)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(route('services.index'));
        }

        if ($service->update($input) && $service->save()) {

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
            return redirect(route('services.edit'));

        }

        return redirect(route('services.index'));
    }

    /**
     * Remove the specified Service from storage.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        if (empty($service)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(route('services.index'));
        }

        $service->delete();

        Flash::success(Lang::get('app.general:delete-success'));

        return redirect(route('services.index'));
    }
}
