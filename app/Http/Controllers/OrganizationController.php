<?php namespace App\Http\Controllers;

use App\Http\Requests\OrganizationRequest;
use App\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;
use Webpatser\Uuid\Uuid;

class OrganizationController extends Controller
{

    /**
     * Show the profile of an user
     *
     */
    public function index()
    {

        $organization = $this->organization;

        $groups = $this->organization->groups()->get();

        $users = $this->organization->users()->get();

        return view('pages.organization.index')->with(compact('organization', 'groups', 'users'));

    }

    /**
     * Show the form for creating a new organization.
     *
     */
    public function create()
    {
        if ($this->organization != null) {
            Flash::error(Lang::get('organization.fail-exists'));
            return redirect(action('OrganizationController@index'));
        } else {
            return view('pages.organization.create');
        }
    }

    /**
     * Store a newly created organization in storage.
     *
     * @param OrganizationRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(OrganizationRequest $request)
    {

        $data = $request->all();

        $user = Auth::user();

        $data['owner_id'] = $user->id;

        if ($this->filterName($request->get('name'))) {
            Flash::error(Lang::get('organization.fail-name'));
            return redirect(action('OrganizationController@create'));
        }

        $this->organization = Organization::create($data);
        $this->organization->uuid = Uuid::generate(4)->string;
        $this->organization->save();

        $user->organization()->associate($this->organization);
        $user->role_id = 2;
        $user->save();

        Flash::success(Lang::get('organization.create-success'));

        return redirect(action('HomeController@index'));
    }

    /**
     * Show the form for editing the profile of the authenticated user
     *
     */
    public function edit()
    {
        return view('pages.organization.edit')->with('organization', $this->organization);
    }

    /**
     * Update the profile of the authenticated user
     *
     * @param OrganizationRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(OrganizationRequest $request)
    {

        if ($this->filterName($request->get('name'))) {
            Flash::error(Lang::get('organization.fail-name'));
            return redirect(action('OrganizationController@edit'));
        }

        $this->organization = Organization::findOrFail($this->organization->id);

        $this->organization->update($request->all());

        $this->organization->save();

        Flash::success(Lang::get('organization.update-success'));

        return redirect(action('OrganizationController@index'));
    }

    /*
     * ADMIN AREA
     */

    #Get all and update this or this


    private function filterName($name)
    {
        $banned_names = [
            'cms', 'irispass', 'mail', 'desktop',
            'bureau', 'chat', 'www', 'office',
            'iris', 'only', 'admin', 'crm', 'erp',
            'dcos', 'jenkins', 'build', 'docker',
            'it',
        ];

        return (starts_with($name, ['www']) || in_array($name, $banned_names));
    }




}



