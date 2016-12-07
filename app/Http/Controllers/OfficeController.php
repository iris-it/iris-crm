<?php

namespace App\Http\Controllers;

use App\Account;
use App\Address;
use App\Http\Requests\OfficeRequest;
use App\Jobs\GeocodeAddressJob;
use App\Office;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class OfficeController extends Controller
{


    /**
     * Show the form for creating a new Office.
     */

    public function create($id)
    {

        $account = Account::findOrFail($id);

        return view('pages.offices.create')->with('account', $account);
    }

    /**
     * Store a newly created Office in storage.
     *
     */

    public function store($id, OfficeRequest $request)
    {
        $input = $request->all();
        $account = Account::findOrFail($id);

        if (!$request->has('is_main')) {
            $input['is_main'] = false;
        }

        if ($office = Office::create($input)) {

            foreach ($input["addresses"] as $address) {
                if ($newAdd = Address::create($address)) {
                    $office->addresses()->attach($newAdd->id, ['type' => $address['type']]);
                    dispatch(new GeocodeAddressJob($newAdd));
                }
            }

            $office->account()->associate($account);
            $office->save();

            Flash::success(Lang::get('app.general:create-success'));


        } else {
            Flash::error(Lang::get('app.general:create-failed'));

        }

        if ($account->is_lead) {

            return redirect(action('LeadController@show', $account->id));

        } else {
            return redirect(action('AccountController@show', $account->id));

        }
    }

    /**
     * Display the specified Office.
     */

    public function show($id, $officeId)
    {
        $account = Account::findOrFail($id);

        if (empty($account)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('AccountController@index'));
        }

        return view('pages.accounts.show')->with('account', $account);
    }

    /**
     * Show the form for editing the specified Account.
     */

    public function edit($id)
    {
        $office = Office::findOrFail($id);

        $account_list = $this->organization->accounts()->where('is_lead', false)->get()->pluck('name', 'id')->toArray();

        if ($office->invoices->count() > 0) {
            Flash::warning(Lang::get('app.warning:leads-forbidden'));

            $accounts = [
                trans('app.general:accounts') => $account_list,

            ];

        } else {
            $lead_list = $this->organization->accounts()->where('is_lead', true)->get()->pluck('name', 'id')->toArray();

            $accounts = [
                trans('app.general:accounts') => $account_list,
                trans('app.general:leads') => $lead_list
            ];
        }


        if (empty($office)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('AccountController@index'));
        }

        return view('pages.offices.edit')->with(compact('office', 'accounts'));


    }

    /**
     * Update the specified Account in storage.
     */

    public function update($id, OfficeRequest $request)
    {

        $input = $request->all();
        $office = Office::findOrFail($id);

        if (!$request->has('is_main')) {
            $input['is_main'] = false;
        }

        if ($office->update($input) && $office->save()) {

            foreach ($input["addresses"] as $address) {
                if ($newAdd = Address::create($address)) {
                    $office->addresses()->attach($newAdd->id, ['type' => $address['type']]);
                    dispatch(new GeocodeAddressJob($newAdd));
                }
            }

            $office->account()->associate($input['office_id']);
            $office->save();

            Flash::success(Lang::get('app.general:update-success'));


        } else {
            Flash::error(Lang::get('app.general:update-failed'));

        }

        if ($office->account->is_lead) {

            return redirect(action('LeadController@show', $office->account->id));

        } else {
            return redirect(action('AccountController@show', $office->account->id));

        }
    }

    /**
     * Remove the specified Account from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $account = Account::findOrFail($id);

        if (empty($account)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('AccountController@index'));
        }

        $account->delete();

        Flash::success(Lang::get('app.general:delete-success'));

        return redirect(action('AccountController@index'));
    }
}
