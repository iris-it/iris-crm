<?php

namespace App\Http\Controllers;


use App\Account;
use App\Invoice;
use App\Order;
use App\Quote;

class HomeController extends Controller
{

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

        $orders = Order::all();
        $quotes = Quote::all();
        $invoices = Invoice::all();
        $convertedAccounts = Account::where('converted', true);


        return view('pages.home.index')->with(compact('organization', 'groups', 'users', 'orders', 'convertedAccounts', 'quotes', 'invoices'));

    }
}
