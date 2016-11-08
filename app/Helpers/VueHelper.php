<?php

namespace App\Helpers;


use Carbon\Carbon;

class VueHelper
{

    public static function showModal($id, array $data = [])
    {
        $toJSON = json_encode($data);

        logger("showModal('$id', $toJSON)");

        return "showModal('$id', $toJSON)";
    }

    public static function saveAndCopy($id, array $data = [])
    {
        $toJSON = json_encode($data);

        logger("saveAndCopy('$id', $toJSON)");

        return "saveAndCopy('$id', {$toJSON})";
    }

}