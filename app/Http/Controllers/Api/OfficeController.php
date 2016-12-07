<?php

namespace App\Http\Controllers\Api;

use App\Account;
use App\Address;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfficeRequest;
use App\Jobs\GeocodeAddressJob;
use App\Office;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class OfficeController extends Controller
{


    /**
     * Show the form for creating a new Office.
     */

    public function fetchQuotes($id)
    {

        $office = Office::findOrFail($id);

        return $office->quotes;
    }

}
