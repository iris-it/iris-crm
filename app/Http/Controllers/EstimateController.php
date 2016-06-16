<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateEstimateRequest;
use App\Http\Requests\UpdateEstimateRequest;
use App\Repositories\EstimateRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EstimateController extends InfyOmBaseController
{
    /** @var  EstimateRepository */
    private $estimateRepository;

    public function __construct(EstimateRepository $estimateRepo)
    {
        $this->estimateRepository = $estimateRepo;
    }

    /**
     * Display a listing of the Estimate.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estimateRepository->pushCriteria(new RequestCriteria($request));
        $estimates = $this->estimateRepository->all();

        return view('pages.estimates.index')
            ->with('estimates', $estimates);
    }

    /**
     * Show the form for creating a new Estimate.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.estimates.create');
    }

    /**
     * Store a newly created Estimate in storage.
     *
     * @param CreateEstimateRequest $request
     *
     * @return Response
     */
    public function store(CreateEstimateRequest $request)
    {
        $input = $request->all();

        $estimate = $this->estimateRepository->create($input);

        Flash::success('Estimate saved successfully.');

        return redirect(route('estimates.index'));
    }

    /**
     * Display the specified Estimate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estimate = $this->estimateRepository->findWithoutFail($id);

        if (empty($estimate)) {
            Flash::error('Estimate not found');

            return redirect(route('estimates.index'));
        }

        return view('pages.estimates.show')->with('estimate', $estimate);
    }

    /**
     * Show the form for editing the specified Estimate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estimate = $this->estimateRepository->findWithoutFail($id);

        if (empty($estimate)) {
            Flash::error('Estimate not found');

            return redirect(route('estimates.index'));
        }

        return view('pages.estimates.edit')->with('estimate', $estimate);
    }

    /**
     * Update the specified Estimate in storage.
     *
     * @param  int              $id
     * @param UpdateEstimateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstimateRequest $request)
    {
        $estimate = $this->estimateRepository->findWithoutFail($id);

        if (empty($estimate)) {
            Flash::error('Estimate not found');

            return redirect(route('estimates.index'));
        }

        $estimate = $this->estimateRepository->update($request->all(), $id);

        Flash::success('Estimate updated successfully.');

        return redirect(route('estimates.index'));
    }

    /**
     * Remove the specified Estimate from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estimate = $this->estimateRepository->findWithoutFail($id);

        if (empty($estimate)) {
            Flash::error('Estimate not found');

            return redirect(route('estimates.index'));
        }

        $this->estimateRepository->delete($id);

        Flash::success('Estimate deleted successfully.');

        return redirect(route('estimates.index'));
    }
}
