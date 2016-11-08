<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\OfficeRequest;
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

        if ($office = Office::create($input)) {

            $office->account()->associate($account);
            $office->save();

            Flash::success(Lang::get('app.general:create-success'));

        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(action('OfficeController@create', $account->id));

        }

        return view('pages.accounts.show')->with('account', $account);
    }

    /**
     * Display the specified Office.
     */

    public function show($id, $officeId)
    {
        $account = Account::findOrFail($id);

        if (empty($account)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(route('accounts.index'));
        }

        return view('pages.accounts.show')->with('account', $account);
    }

    /**
     * Show the form for editing the specified Account.
     */

    public function edit($id)
    {
        $account = Account::findOrFail($id);

        if (empty($account)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(route('accounts.index'));
        }

        return view('pages.accounts.edit')->with('account', $account);
    }

    /**
     * Update the specified Account in storage.
     */

    public function update($id, AccountRequest $request)
    {
        $account = Account::findOrFail($id);
        $data = $request->all();

        if (empty($account)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(route('accounts.index'));
        }

        if ($account->update($data) && $account->save()) {

            Flash::success(Lang::get('app.general:update-success'));

        } else {

            Flash::error(Lang::get('app.general:update-failure'));
            return redirect(route('accounts.edit'));
        }

        return redirect(route('accounts.index'));
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

            return redirect(route('accounts.index'));
        }

        $account->delete();

        Flash::success(Lang::get('app.general:delete-success'));

        return redirect(route('accounts.index'));
    }
}
