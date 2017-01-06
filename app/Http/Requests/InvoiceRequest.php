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
        switch ($this->method()) {
            case 'POST': {
                return [

                    'topic' => 'required|max:255|string',
                    'phase' => 'required|max:255|string',
                    'deadline' => '',
                    'description' => 'string',
                    'ht_price' => 'numeric',
                    'ttc_price' => 'numeric',
                    'special_conditions' => 'string',


                    /*Relations*/

                    'office_id' => 'integer',
                    'quote_id' => 'integer',
                    'products.*' => '',
                    'services.*' => '',


                ];
            }
            case 'PATCH': {
                return [

                    'topic' => 'required|max:255|string',
                    'phase' => 'required|max:255|string',
                    'deadline' => '',
                    'description' => 'string',
                    'ht_price' => 'numeric',
                    'ttc_price' => 'numeric',
                    'special_conditions' => 'string',

                    /*Relations*/

                    'office_id' => 'integer',
                    'quote_id' => 'integer',
                    'products.*' => '',
                    'services.*' => '',


                ];
            }
        }
    }
}
