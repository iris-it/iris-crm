<?php

namespace App\Helpers;


use Carbon\Carbon;

class StatisticsHelper
{

    public static function getDaysInMonth()
    {
        $data = [];

        setlocale(LC_TIME, 'French');

        $from = Carbon::today()->startOfMonth();
        $to = Carbon::today()->endOfMonth();

        while ($from->diffInDays($to) != 0) {
            $data[] = $from->formatLocalized('%d %B');
            $from = $from->addDay();
        }
        return json_encode($data);
    }

    public static function generateRevenuesByMonth($invoices)
    {

        $data = [];

        $from = Carbon::today()->startOfMonth();
        $to = Carbon::today()->endOfMonth();

        while ($from->diffInDays($to) != 0) {
            $x = $from->day;
            $y = $invoices->map(function ($item, $key) use ($from, $to) {
                if ($item->created_at > $from->startOfDay() && $item->created_at < $from->endOfDay()) {
                    return $item->ttc_price;
                }
                return 0;
            })->reduce(function ($carry, $item) {
                return $carry + $item;
            });

            $data['label'] = 'factures';
            $data['borderColor'] = 'rgba(30, 14, 60, .07)';
            $data['backgroundColor'] = 'rgba(30, 90, 200, .25)';
            $data['pointBackgroundColor'] = '#000';
            $data['pointBorderColor'] = '#fff';
            $data['pointHoverBackgroundColor'] = '#fff';
            $data['pointHoverBorderColor'] = 'rgba(30, 70, 200, 1)';
            $data['data'][$x - 1] = $y;
            $from = $from->addDay();
        }
        return json_encode(array($data));
    }


}