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

        $quotes = null;
        $receipts = null;
        $invoices = null;

        foreach ($this->organization->accounts as $account) {

            $noQuotes = $account->quotes->count() < 1;
            $noInvoices = $account->invoices->count() < 1;

            $emptyQuotesCollec = $quotes == null;
            $emptyInvoicesCollec = $invoices == null;


            if (!$noQuotes && $emptyQuotesCollec) {
                $quotes = $account->quotes;
            } elseif (!$noQuotes && !$emptyQuotesCollec) {
                $quotes = $quotes->merge($account->quotes);

            }

            if (!$noInvoices && $emptyInvoicesCollec) {
                $invoices = $account->invoices;
            } elseif (!$noInvoices && !$emptyInvoicesCollec) {
                $invoices = $invoices->merge($account->invoices);

            }

            foreach ($account->quotes as $quote) {

                $emptyReceiptsCollec = $receipts == null;

                if ($quote->receipt && $emptyReceiptsCollec) {
                    $receipts = $quote->receipt;

                } elseif ($quote->receipt && !$emptyReceiptsCollec) {
                    $receipts->push($quote->receipt);
                }

            }

        }


        $convertedAccounts = $this->organization->accounts()->where('converted', true)->get();


        return view('pages.home.index')->with(compact('organization', 'receipts', 'convertedAccounts', 'quotes', 'invoices'));

    }
}
