<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Repositories\LeadRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;
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
        $users = User::lists('name', 'id');
        return view('pages.leads.create')->with(compact('users'));
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

        if ($lead = $this->leadRepository->create($input)) {

            $user = User::findOrFail($request->account_owner_id);
            $lead->user()->associate($user);
            $lead->save();
            Flash::success(Lang::get('app.general:create-success'));

        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(route('leads.create'));

        }

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
        $users = User::lists('name', 'id');

        if (empty($lead)) {
            Flash::error('Lead not found');

            return redirect(route('leads.index'));
        }

        return view('pages.leads.edit')->with(compact('users', 'lead'));
    }

    /**
     * Update the specified Lead in storage.
     *
     * @param  int $id
     * @param UpdateLeadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLeadRequest $request)
    {
        $lead = $this->leadRepository->findWithoutFail($id);

        if (empty($lead)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(route('leads.index'));
        }

        if ($lead = $this->leadRepository->update($request->all(), $id)) {

            $user = User::findOrFail($request->account_owner_id);
            $lead->user()->associate($user);
            $lead->save();
            Flash::success(Lang::get('app.general:update-success'));

        } else {

            Flash::error(Lang::get('app.general:update-failure'));
            return redirect(route('leads.edit'));
        }

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
