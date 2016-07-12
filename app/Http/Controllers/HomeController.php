<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests;
use App\Invoice;
use App\Order;
use App\Quote;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $quotes = Quote::all();
        $invoices = Invoice::all();
        $convertedAccounts = Account::where('converted', true);
        
        return view('pages.home.index')->with(compact('orders', 'convertedAccounts', 'quotes', 'invoices'));
    }
}
