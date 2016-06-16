<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Repositories\LeadRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LeadController extends InfyOmBaseController
{
    /** @var  LeadRepository */
    private $leadRepository;

    public function __construct(LeadRepository $leadRepo)
    {
        $this->leadRepository = $leadRepo;
    }

    /**
     * Display a listing of the Lead.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->leadRepository->pushCriteria(new RequestCriteria($request));
        $leads = $this->leadRepository->all();

        return view('pages.leads.index')
            ->with('leads', $leads);
    }

    /**
     * Show the form for creating a new Lead.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.leads.create');
    }

    /**
     * Store a newly created Lead in storage.
     *
     * @param CreateLeadRequest $request
     *
     * @return Response
     */
    public function store(CreateLeadRequest $request)
    {
        $input = $request->all();

        $lead = $this->leadRepository->create($input);

        Flash::success('Lead saved successfully.');

        return redirect(route('leads.index'));
    }

    /**
     * Display the specified Lead.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lead = $this->leadRepository->findWithoutFail($id);

        if (empty($lead)) {
            Flash::error('Lead not found');

            return redirect(route('leads.index'));
        }

        return view('pages.leads.show')->with('lead', $lead);
    }

    /**
     * Show the form for editing the specified Lead.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lead = $this->leadRepository->findWithoutFail($id);

        if (empty($lead)) {
            Flash::error('Lead not found');

            return redirect(route('leads.index'));
        }

        return view('pages.leads.edit')->with('lead', $lead);
    }

    /**
     * Update the specified Lead in storage.
     *
     * @param  int              $id
     * @param UpdateLeadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLeadRequest $request)
    {
        $lead = $this->leadRepository->findWithoutFail($id);

        if (empty($lead)) {
            Flash::error('Lead not found');

            return redirect(route('leads.index'));
        }

        $lead = $this->leadRepository->update($request->all(), $id);

        Flash::success('Lead updated successfully.');

        return redirect(route('leads.index'));
    }

    /**
     * Remove the specified Lead from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lead = $this->leadRepository->findWithoutFail($id);

        if (empty($lead)) {
            Flash::error('Lead not found');

            return redirect(route('leads.index'));
        }

        $this->leadRepository->delete($id);

        Flash::success('Lead deleted successfully.');

        return redirect(route('leads.index'));
    }
}
