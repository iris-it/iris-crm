<?php

namespace App\Http\Controllers;

use App\Account;
use App\Contact;
use App\Http\Requests\ContactRequest;
use App\Office;
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
        $accounts = $this->organization->accounts->where('is_lead', false)->get();
        $leads = $this->organization->accounts->where('is_lead', true)->get();

        return view('pages.contacts.index')->with(compact('contacts', 'accounts', 'leads'));
    }

    /**
     * Show the form for creating a new Contact.
     */
    public function create($id)
    {
        $account = Account::findOrFail($id);
        $offices = $account->offices;

        return view('pages.contacts.create')->with(compact('account', 'offices'));
    }

    /**
     * Store a newly created Contact in storage.
     */

    public function store(ContactRequest $request)
    {
        $input = $request->all();

        if ($contact = Contact::create($input)) {

            $office = Office::findOrFail($request->office_id);
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
    public function edit($id, $accountId)
    {
        $contact = Contact::findOrFail($id);
        $account = Account::findOrFail($accountId);
        $offices = $account->offices;

        if (empty($contact)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(action('ContactController@index'));
        }

        return view('pages.contacts.edit')->with(compact('contact', 'account', 'offices'));
    }

    /**
     * Update the specified Contact in storage.
     */
    public function update($id, ContactRequest $request)
    {
        $contact = Contact::findOrFail($id);
        $input = $request->all();

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
