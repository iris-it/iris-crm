<?php

namespace App\Http\Controllers;


use App\Account;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;


class LeadController extends Controller
{

    /**
     * Display a listing of the Lead.
     */
    public function index()
    {
        $leads = $this->organization->accounts()->where('is_lead', true)->get();

        return view('pages.leads.index')->with('leads', $leads);
    }

    /**
     * Show the form for creating a new Lead.
     */
    public function create()
    {
        return view('pages.leads.create');
    }

    /**
     * Store a newly created Lead in storage.
     *
     */
    public function store(AccountRequest $request)
    {
        $input = $request->all();

        if ($lead = Account::create($input)) {

            $lead->converted = false;
            $lead->is_lead = true;
            $lead->organization()->associate($this->organization);
            $lead->save();

            Flash::success(Lang::get('app.general:create-success'));

        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(action('LeadController@create'));

        }

        return redirect(action('LeadController@index'));
    }

    /**
     * Display the specified Lead.
     *
     */
    public function show($id)
    {
        $lead = Account::findOrFail($id);

        if (empty($lead)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('LeadController@index'));
        }

        return view('pages.leads.show')->with('lead', $lead);
    }

    /**
     * Show the form for editing the specified Lead.
     */
    public function edit($id)
    {
        $lead = Account::findOrFail($id);

        if (empty($lead)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('LeadController@index'));
        }

        return view('pages.leads.edit')->with('lead', $lead);
    }

    /**
     * Update the specified Lead in storage.
     */
    public function update($id, AccountRequest $request)
    {
        $lead = Account::findOrFail($id);
        $data = $request->all();

        if (empty($lead)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('LeadController@index'));
        }

        if ($lead->update($data) && $lead->save()) {

            Flash::success(Lang::get('app.general:update-success'));

        } else {

            Flash::error(Lang::get('app.general:update-failure'));
            return redirect(action('LeadController@edit'));
        }

        return redirect(action('LeadController@index'));
    }

    /**
     * Remove the specified Lead from storage.
     */
    public function destroy($id)
    {
        $lead = Account::findOrFail($id);

        if (empty($lead)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('LeadController@index'));
        }

        $lead->delete();
        Flash::success(Lang::get('app.general:delete-success'));

        return redirect(action('LeadController@index'));
    }
}
