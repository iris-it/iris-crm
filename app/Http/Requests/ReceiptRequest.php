<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Receipt;

class ReceiptRequest extends Request
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
                    'supplier' => 'required|max:255|string',
                    'order_date' => 'required',
                    'delivery_deadline' => 'required',
                    'description' => 'string',
                    'special_conditions' => 'string',

                    'quote_id' => 'integer'
                ];
            }
            case 'PATCH': {
                return [
                    'topic' => 'required|max:255|string',
                    'supplier' => 'required|max:255|string',
                    'order_date' => 'required',
                    'delivery_deadline' => 'required',
                    'description' => 'string',
                    'special_conditions' => 'string',

                    'quote_id' => 'integer'
                ];
            }
        }
    }
}
