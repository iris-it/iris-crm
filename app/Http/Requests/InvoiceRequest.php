<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Invoice;

class InvoiceRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'topic' => 'required|max:255|string',
            'phase' => 'required|max:255|string',
            'deadline' => 'required',
            'description' => 'string',
            'ht_price' => 'numeric',
            'ttc_price' => 'numeric',
            'special_conditions' => 'string',
            'address' => 'required|string',
            'zipcode' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',

            /*Relations*/

            'office_id' => 'integer',
            'contact_id' => 'integer',
            'quote_id' => 'integer',
            'products.*' => '',
            'services.*' => '',


        ];
    }
}
