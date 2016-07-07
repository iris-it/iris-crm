<?php

namespace App\Services;

use App\Invoice;
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: monkey_C
 * Date: 08-Jul-16
 * Time: 1:11 AM
 */
class StatsService
{
    public function generateRevenuesByMonth($invoices) {

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
        return $coordinates;
    }

}