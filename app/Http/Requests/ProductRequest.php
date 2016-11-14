<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Product;

class ProductRequest extends Request
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

                    'product_name' => 'string|max:255|required',
                    'is_active' => '',
                    'category' => 'string|max:255|required',
                    'ht_price' => 'numeric|required',
                    'ttc_price' => 'numeric',
                    'stock_disponibility' => 'integer|required',
                    'product_avatar' => 'string',
                    'sale_datestart' => 'required',
                    'sale_dateend' => 'required',
                    'product_notice' => 'string',
                    'description' => 'string',

                    /*Relations*/

                    'taxes.*' => '',
                    'manutention_officer_id' => 'integer',

                ];
            }
            case 'PATCH': {
                return [

                    'product_name' => 'string|max:255|required',
                    'is_active' => '',
                    'category' => 'string|max:255|required',
                    'ht_price' => 'numeric|required',
                    'ttc_price' => 'numeric',
                    'stock_disponibility' => 'integer|required',
                    'product_avatar' => 'string',
                    'sale_datestart' => 'required',
                    'sale_dateend' => 'required',
                    'product_notice' => 'string',
                    'description' => 'string',

                    /*Relations*/

                    'taxes.*' => '',
                    'manutention_officer_id' => 'integer',

                ];
            }
        }
    }
}
