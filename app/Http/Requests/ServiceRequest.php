<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Service;

class ServiceRequest extends Request
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

                    'service_name' => 'string|max:255|required',
                    'is_active' => '',
                    'category' => 'string|max:255|required',
                    'sale_unit' => 'string|max:255|required',
                    'ht_price' => 'numeric|required',
                    'ttc_price' => 'numeric',
                    'sale_datestart' => 'required',
                    'sale_dateend' => 'required',
                    'service_avatar' => 'image|mimes:jpg,jpeg,png,gif|max:50000',
                    'crop_options' => 'string',
                    'description' => 'string',

                    /*Relations*/

                    'taxes.*' => 'required'
                ];
            }
            case 'PATCH': {
                return [

                    'service_name' => 'string|max:255|required',
                    'is_active' => '',
                    'category' => 'string|max:255|required',
                    'sale_unit' => 'string|max:255|required',
                    'ht_price' => 'numeric|required',
                    'ttc_price' => 'numeric',
                    'sale_datestart' => 'required',
                    'sale_dateend' => 'required',
                    'service_avatar' => 'image|mimes:jpg,jpeg,png,gif|max:50000',
                    'crop_options' => 'string',
                    'description' => 'string',

                    /*Relations*/

                    'taxes.*' => 'required'
                ];
            }
        }
    }
}
