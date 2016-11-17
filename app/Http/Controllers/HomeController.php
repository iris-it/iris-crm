<?php

namespace App\Http\Controllers;


use App\Account;
use App\Invoice;
use App\Quote;
use App\Receipt;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {

        //FIXME Les bonnes requetes vers l'organisation de l'utilisateur :)

        $receipts = Receipt::all();
        $quotes = Quote::all();
        $invoices = Invoice::all();
        $convertedAccounts = Account::where('converted', true);


        return view('pages.home.index')->with(compact('organization', 'orders', 'convertedAccounts', 'quotes', 'invoices'));

    }
}
