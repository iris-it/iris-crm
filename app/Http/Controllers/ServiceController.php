<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Repositories\ServiceRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ServiceController extends InfyOmBaseController
{
    /** @var  ServiceRepository */
    private $serviceRepository;

    public function __construct(ServiceRepository $serviceRepo)
    {
        $this->serviceRepository = $serviceRepo;
    }

    /**
     * Display a listing of the Service.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->serviceRepository->pushCriteria(new RequestCriteria($request));
        $services = $this->serviceRepository->all();

        return view('pages.services.index')
            ->with('services', $services);
    }

    /**
     * Show the form for creating a new Service.
     *
     * @return Response
     */
    public function create()
    {
        $taxes = Tax::lists('name', 'id');

        return view('pages.services.create')->with(compact('taxes'));
    }

    /**
     * Store a newly created Service in storage.
     *
     * @param CreateServiceRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceRequest $request)
    {
        $input = $request->all();
        $totalTaxes = 0;

        if ($service = $this->serviceRepository->create($input)) {

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
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('services.index'));
        }

        return view('pages.services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified Service.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $service = $this->serviceRepository->findWithoutFail($id);
        $taxes = Tax::lists('name', 'id');


        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('services.index'));
        }

        return view('pages.services.edit')->with(compact('service', 'taxes'));
    }

    /**
     * Update the specified Service in storage.
     *
     * @param  int $id
     * @param UpdateServiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceRequest $request)
    {
        $input = $request->all();
        $service = $this->serviceRepository->findWithoutFail($id);
        $totalTaxes = 0;

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('services.index'));
        }

        if ($service = $this->serviceRepository->update($request->all(), $id)) {

            if (!$request->has('taxes')) {
                $input["taxes"] = [];
            }
            
            $service->taxes()->sync($input["taxes"] ?: []);
            $service->save();

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
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('services.index'));
        }

        $this->serviceRepository->delete($id);

        Flash::success('Service deleted successfully.');

        return redirect(route('services.index'));
    }
}
