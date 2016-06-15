<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProspectRequest;
use App\Http\Requests\UpdateProspectRequest;
use App\Repositories\ProspectRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProspectController extends InfyOmBaseController
{
    /** @var  ProspectRepository */
    private $prospectRepository;

    public function __construct(ProspectRepository $prospectRepo)
    {
        $this->prospectRepository = $prospectRepo;
    }

    /**
     * Display a listing of the Prospect.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->prospectRepository->pushCriteria(new RequestCriteria($request));
        $prospects = $this->prospectRepository->all();

        return view('pages.prospects.index')
            ->with('prospects', $prospects);
    }

    /**
     * Show the form for creating a new Prospect.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.prospects.create');
    }

    /**
     * Store a newly created Prospect in storage.
     *
     * @param CreateProspectRequest $request
     *
     * @return Response
     */
    public function store(CreateProspectRequest $request)
    {
        $input = $request->all();

        $prospect = $this->prospectRepository->create($input);

        Flash::success('Prospect saved successfully.');

        return redirect(route('prospects.index'));
    }

    /**
     * Display the specified Prospect.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $prospect = $this->prospectRepository->findWithoutFail($id);

        if (empty($prospect)) {
            Flash::error('Prospect not found');

            return redirect(route('prospects.index'));
        }

        return view('pages.prospects.show')->with('prospect', $prospect);
    }

    /**
     * Show the form for editing the specified Prospect.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $prospect = $this->prospectRepository->findWithoutFail($id);

        if (empty($prospect)) {
            Flash::error('Prospect not found');

            return redirect(route('prospects.index'));
        }

        return view('pages.prospects.edit')->with('prospect', $prospect);
    }

    /**
     * Update the specified Prospect in storage.
     *
     * @param  int              $id
     * @param UpdateProspectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProspectRequest $request)
    {
        $prospect = $this->prospectRepository->findWithoutFail($id);

        if (empty($prospect)) {
            Flash::error('Prospect not found');

            return redirect(route('prospects.index'));
        }

        $prospect = $this->prospectRepository->update($request->all(), $id);

        Flash::success('Prospect updated successfully.');

        return redirect(route('prospects.index'));
    }

    /**
     * Remove the specified Prospect from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $prospect = $this->prospectRepository->findWithoutFail($id);

        if (empty($prospect)) {
            Flash::error('Prospect not found');

            return redirect(route('prospects.index'));
        }

        $this->prospectRepository->delete($id);

        Flash::success('Prospect deleted successfully.');

        return redirect(route('prospects.index'));
    }
}
