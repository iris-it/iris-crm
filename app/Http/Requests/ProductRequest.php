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

                    'name' => 'string|max:255|required',
                    'is_active' => '',
                    'category' => 'string|max:255|required',
                    'ht_price' => 'numeric|required',
                    'ttc_price' => 'numeric',
                    'stock_disponibility' => 'integer|required',
                    'sale_unit' => 'string|max:255',
                    'product_avatar' => 'image|mimes:jpg,jpeg,png,gif|max:50000',
                    'crop_options' => 'string',
                    'sale_datestart' => 'required',
                    'sale_dateend' => 'required',
                    'product_notice' => 'string',
                    'description' => 'string',

                    /*Relations*/

                    'taxes.*' => 'required',

                ];
            }
            case 'PATCH': {
                return [

                    'name' => 'string|max:255|required',
                    'is_active' => '',
                    'category' => 'string|max:255|required',
                    'ht_price' => 'numeric|required',
                    'ttc_price' => 'numeric',
                    'stock_disponibility' => 'integer|required',
                    'sale_unit' => 'string|max:255|required',
                    'product_avatar' => 'image|mimes:jpg,jpeg,png,gif|max:50000',
                    'crop_options' => 'string',
                    'sale_datestart' => 'required',
                    'sale_dateend' => 'required',
                    'product_notice' => 'string',
                    'description' => 'string',

                    /*Relations*/

                    'taxes.*' => 'required',

                ];
            }
        }
    }
}
