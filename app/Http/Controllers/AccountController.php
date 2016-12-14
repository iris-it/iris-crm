<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\AccountRequest;
use App\Services\Base64ToImageService;
use App\Services\ImageService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class AccountController extends Controller
{


    /**
     * Display a listing of the Account.
     */

    public function index()
    {

        $accounts = $this->organization->accounts()->where('is_lead', false)->get();
        $isLead = false;


        return view('pages.accounts.index')->with(compact('accounts','isLead'));

    }

    /**
     * Show the form for creating a new Account.
     */

    public function create()
    {
        $isLead = false;
        return view('pages.accounts.create')->with('isLead', $isLead);
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
            return redirect(action('AccountController@create'));

        }

        return view('pages.accounts.show')->with('account', $account);
    }

    /**
     * Display the specified Account.
     */

    public function show($id)
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
        $account = Account::findOrFail($id);

        if (empty($account)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('AccountController@index'));
        }

        return view('pages.accounts.edit')->with('account', $account);
    }

    /**
     * Update the specified Account in storage.
     * @param $id
     * @param AccountRequest $request
     * @param Base64ToImageService $base64ToImage
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function update($id, AccountRequest $request, ImageService $imageService)
    {
        $account = Account::findOrFail($id);

        $data = $request->all();

        if ($request->file('image')) {
            $filename = $imageService->processTo('accounts/', $request);
            $data['logo'] = $filename;
        }

        if (empty($account)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('AccountController@index'));
        }

        if ($account->update($data) && $account->save()) {

            Flash::success(Lang::get('app.general:update-success'));

        } else {

            Flash::error(Lang::get('app.general:update-failure'));
            return redirect(action('AccountController@edit'));
        }

        return redirect(action('AccountController@index'));
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
