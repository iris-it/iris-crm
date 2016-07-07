<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests;
use App\Invoice;
use App\Order;
use App\Quote;
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
    public function index()
    {
        $orders = Order::all();
        $convertedAccounts = Account::where('converted', true);
        $quotes = Quote::all();
        $invoices = Invoice::all();
        $coordinates = [];

        $from = Carbon::today()->startOfMonth();
        $to = Carbon::today()->endOfMonth();

        while($from->diffInDays($to) != 0) {
            $x = $from->day;
            $y = $invoices->map(function($item, $key) use ($from, $to) {
               if($item->created_at > $from->startOfDay() && $item->created_at < $from->endOfDay()) {
                   return $item->ttc_price;
               }
                return 0;
            })->reduce(function($carry, $item) {
                return $carry + $item;
            });

            $coordinates[] = ['x' => $x, 'y' => $y];
            $from = $from->addDay();
        }


        JavaScript::put([
            'char_data' => $coordinates,
        ]);
        


        return view('pages.home.index')->with(compact('orders', 'convertedAccounts', 'quotes', 'invoices'));
    }
}
