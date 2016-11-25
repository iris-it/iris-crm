<?php

namespace App\Http\Controllers;


use App\Account;
use App\Invoice;
use App\Quote;
use App\Receipt;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {

        //FIXME


        $quotes = new Collection();
        $receipts = new Collection();
        $invoices = new Collection();

        foreach ($this->organization->accounts as $account) {
            if ($account->quotes->count() > 0) {
                $quotes->push($account->quotes);
            }
            if ($account->invoices->count() > 0) {
                $invoices->push($account->invoices);
            }

            foreach ($account->quotes as $quote) {
                if ($quote->receipt) {
                    $receipts->push($quote->receipt);
                }
            }
        }

        $convertedAccounts = $this->organization->accounts()->where('converted', true)->get();


        return view('pages.home.index')->with(compact('organization', 'receipts', 'convertedAccounts', 'quotes', 'invoices'));

    }
}
