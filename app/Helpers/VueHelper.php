<?php

namespace App\Helpers;


use Carbon\Carbon;

class VueHelper
{

    public static function format($method, $id, $data)
    {
        $toJSON = json_encode($data);

        return $method . "('$id', $toJSON)";
    }

}