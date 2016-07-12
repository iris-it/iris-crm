<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests;
use App\Invoice;
use App\Order;
use App\Quote;
use App\Services\StatsService;
use Carbon\Carbon;
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
    public function index(StatsService $statsService)
    {
        $orders = Order::all();
        $quotes = Quote::all();
        $invoices = Invoice::all();
        $convertedAccounts = Account::where('converted', true);
        
        

        JavaScript::put([
            'char_data' => $statsService->generateRevenuesByMonth($invoices)
        ]);


        return view('pages.home.index')->with(compact('orders', 'convertedAccounts', 'quotes', 'invoices'));
    }
}
