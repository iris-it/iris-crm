<?php

namespace App\Http\Controllers;

use App\Account;
use App\Contact;
use App\Http\Requests\ContactRequest;
use App\Office;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class ContactController extends Controller
{

    /**
     * Display a listing of the Contact.
     */
    public function index()
    {
        $contacts = $this->organization->contacts;

        $account_list = $this->organization->accounts()->where('is_lead', false)->get()->pluck('name', 'id')->toArray();
        $lead_list = $this->organization->accounts()->where('is_lead', true)->get()->pluck('name', 'id')->toArray();

        $accounts = [
            trans('app.general:accounts') => $account_list,
            trans('app.general:leads') => $lead_list
        ];


        return view('pages.contacts.index')->with(compact('contacts', 'accounts'));
    }

    /**
     * Show the form for creating a new Contact.
     */
    public function create(Request $request)
    {
        $account_id = $request->get('account_id');

        if (!Account::find($account_id)) {
            return abort(403, 'unauthorized');
        }

        $account = Account::findOrFail($account_id);

        if ($request->has('office_id')) {
            $office = Office::findOrFail($request->get('office_id'));
        }

        $offices = $account->offices->pluck('name', 'id');

        if ($offices->count() === 0) {
            Flash::error(Lang::get('app.general:missing-office'));
            return redirect(action('AccountController@show', $account_id));
        }

        return view('pages.contacts.create')->with(compact('offices', 'office', 'account'));
    }

    /**
     * Store a newly created Contact in storage.
     */

    public function store(ContactRequest $request, ImageService $imageService)
    {
        $input = $request->all();

        if ($request->file('avatar')) {
            $filename = $imageService->processTo('contacts/', $request, 'avatar');
            $input['avatar'] = $filename;
        }

        if ($contact = Contact::create($input)) {

            $office = Office::findOrFail($request->office_id);
            $contact->organization()->associate($this->organization);
            $contact->office()->associate($office);

            $contact->save();

            Flash::success(Lang::get('app.general:create-success'));
        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(action('ContactController@create'));

        }

        return redirect(action('ContactController@index'));
    }

    /**
     * Display the specified Contact.
     *
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        if (empty($contact)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('ContactController@index'));
        }

        return view('pages.contacts.show')->with('contact', $contact);
    }

    /**
     * Show the form for editing the specified Contact.
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        $offices = $contact->office->account->offices->pluck('name', 'id');;

        if (empty($contact)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('ContactController@index'));
        }

        return view('pages.contacts.edit')->with(compact('contact', 'offices'));
    }

    /**
     * Update the specified Contact in storage.
     */
    public function update($id, ContactRequest $request, ImageService $imageService)
    {

        $contact = Contact::findOrFail($id);
        $input = $request->all();

        if ($request->file('avatar')) {
            $filename = $imageService->processTo('contacts/', $request, 'avatar');
            $input['avatar'] = $filename;
        }

        if (empty($contact)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('ContactController@index'));
        }

        if ($contact->update($input) && $contact->save()) {

            $office = Office::findOrFail($request->office_id);
            $contact->office()->associate($office);

            $contact->save();

            Flash::success(Lang::get('app.general:update-success'));

        } else {

            Flash::error(Lang::get('app.general:update-failed'));
            return redirect(action('ContactController@edit'));

        }


        return redirect(action('ContactController@index'));
    }

    /**
     * Remove the specified Contact from storage.
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);

        if (empty($contact)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('ContactController@index'));
        }

        $contact->delete();

        Flash::success(Lang::get('app.general:delete-success'));

        return redirect(action('ContactController@index'));
    }
}
