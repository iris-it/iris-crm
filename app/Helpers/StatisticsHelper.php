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

            $data['label'] = 'Ventes';
            $data['borderColor'] = '#00a4cc';
            $data['backgroundColor'] = '#00c0ef';
            $data['pointBorderColor'] = '#000000';
            $data['pointBackgroundColor'] = '#00c0ef';
            $data['pointBorderWidth'] = 0.7;
            $data['pointHoverBorderColor'] = 'rgba(30, 70, 200, 1)';
            $data['pointHoverRadius'] = 6;
            $data['lineTension'] = 0;
            $data['borderWidth'] = 2;
            $data['borderJoinStyle'] = "miter";

            $data['data'][$x - 1] = $y;
            $from = $from->addDay();
        }
        return json_encode(array($data));
    }




}