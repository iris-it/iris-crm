<?php

namespace App\Http\Controllers;


use App\Account;
use App\Invoice;
use App\Quote;
use App\Receipt;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('hasOrganization');

        $this->organization = Auth::user()->organization;
    }


    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {

        if ($this->organization) {
            $groups = $this->organization->groups()->get();
            $users = $this->organization->users()->get();
        }

        $receipts = Receipt::all();
        $quotes = Quote::all();
        $invoices = Invoice::all();
        $convertedAccounts = Account::where('converted', true);


        return view('pages.home.index')->with(compact('organization', 'groups', 'users', 'orders', 'convertedAccounts', 'quotes', 'invoices'));

    }
}
