<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests;
use App\Invoice;
use App\Order;
use App\Quote;
use Illuminate\Http\Request;
use JavaScript;

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
        $convertedAccounts = Account::where('converted', true);
        $quotes = Quote::all();
        $invoices = Invoice::all();

        JavaScript::put([
            'data' => [10,20,30,40],
            'age' => 29
        ]);

        //TODO : service pour récupérer toutes les ventes depuis les factures
        $sales = 244;


        return view('pages.home.index')->with(compact('orders', 'convertedAccounts', 'quotes', 'invoices'));
    }
}
