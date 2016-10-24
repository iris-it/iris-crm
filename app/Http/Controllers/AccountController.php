<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class AccountController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('hasOrganization');

        $this->organization = Auth::user()->organization;
    }

    /**
     * Display a listing of the Account.
     */

    public function index()
    {
        $accounts = $this->organization->accounts()->where('is_lead', false)->get();

        return view('pages.accounts.index')->with('accounts', $accounts);

    }

    /**
     * Show the form for creating a new Account.
     */

    public function create()
    {

        return view('pages.accounts.create');
    }

    /**
     * Store a newly created Account in storage.
     *
     */

    public function store(AccountRequest $request)
    {
        $input = $request->all();


        if ($account = Account::create($input)) {

            $account->converted = false;
            $account->is_lead = false;
            $account->organization()->associate($this->organization);
            $account->save();

            Flash::success(Lang::get('app.general:create-success'));

        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(route('accounts.create'));

        }

        return redirect(route('accounts.index'));
    }

    /**
     * Display the specified Account.
     */

    public function show($id)
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

        if($account->update($data) && $account->save()) {

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
