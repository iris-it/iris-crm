<?php

namespace App\Helpers;


use Carbon\Carbon;

class VueHelper
{

    public static function showModal($id, array $data = [])
    {
        $toJSON = json_encode($data);
        return "showModal('$id', $toJSON)";
    }

}