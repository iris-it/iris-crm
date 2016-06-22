<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Lead;
use App\Repositories\ContactRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ContactController extends InfyOmBaseController
{
    /** @var  ContactRepository */
    private $contactRepository;

    public function __construct(ContactRepository $contactRepo)
    {
        $this->contactRepository = $contactRepo;
    }

    /**
     * Display a listing of the Contact.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->contactRepository->pushCriteria(new RequestCriteria($request));
        $contacts = $this->contactRepository->all();

        return view('pages.contacts.index')
            ->with('contacts', $contacts);
    }

    /**
     * Show the form for creating a new Contact.
     *
     * @return Response
     */
    public function create()
    {
        $accounts = Account::lists('name', 'id');
        $leads = Lead::lists('name', 'id');
        $users = User::lists('name', 'id');
        $types = [
            trans('app.contact:account-type') => 1,
            trans('app.contact:lead-type') => 0
        ];

        return view('pages.contacts.create')->with(compact('accounts', 'leads', 'users', 'types'));
    }

    /**
     * Store a newly created Contact in storage.
     *
     * @param CreateContactRequest $request
     *
     * @return Response
     */
    public function store(CreateContactRequest $request)
    {
        $input = $request->all();


        if ($contact = $this->contactRepository->create($input)) {

            $user = User::findOrFail($request->contact_owner_id);

            if ($contact->type == 0) {

                $lead = Lead::findOrFail($request->lead_name_id);
                $contact->lead()->associate($lead);
                $contact->save();
            } else {

                $account = Account::findOrFail($request->account_name_id);
                $contact->account()->associate($account);
                $contact->save();
            }

            $contact->user()->associate($user);
            $contact->save();

            Flash::success(Lang::get('app.general:create-success'));

        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(route('contacts.create'));

        }

        return redirect(route('contacts.index'));
    }

    /**
     * Display the specified Contact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contact = $this->contactRepository->findWithoutFail($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }

        return view('pages.contacts.show')->with('contact', $contact);
    }

    /**
     * Show the form for editing the specified Contact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contact = $this->contactRepository->findWithoutFail($id);
        $accounts = Account::lists('name', 'id');
        $leads = Lead::lists('name', 'id');
        $users = User::lists('name', 'id');
        $types = [
            trans('app.contact:account-type') => 1,
            trans('app.contact:lead-type') => 0
        ];

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }

        return view('pages.contacts.edit')->with(compact('contact', 'accounts', 'leads', 'users', 'types'));
    }

    /**
     * Update the specified Contact in storage.
     *
     * @param  int $id
     * @param UpdateContactRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactRequest $request)
    {
        $contact = $this->contactRepository->findWithoutFail($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }

        if ($contact = $this->contactRepository->update($request->all(), $id)) {

            $user = User::findOrFail($request->contact_owner_id);

            if ($request->type == 0) {

                $contact->account()->dissociate();

                $lead = Lead::findOrFail($request->lead_name_id);
                $contact->lead()->associate($lead);
                $contact->save();
            } else {

                $contact->lead()->dissociate();

                $account = Account::findOrFail($request->account_name_id);
                $contact->account()->associate($account);
                $contact->save();
            }

            $contact->user()->associate($user);
            $contact->save();

            Flash::success(Lang::get('app.general:update-success'));

        } else {

            Flash::error(Lang::get('app.general:update-failed'));
            return redirect(route('contacts.edit'));

        }


        return redirect(route('contacts.index'));
    }

    /**
     * Remove the specified Contact from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contact = $this->contactRepository->findWithoutFail($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }

        $this->contactRepository->delete($id);

        Flash::success('Contact deleted successfully.');

        return redirect(route('contacts.index'));
    }
}
