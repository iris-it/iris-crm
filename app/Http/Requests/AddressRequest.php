<?php

namespace App\Http\Requests;

use App\Address;
use App\Http\Requests\Request;

class AddressRequest extends Request
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
                return
                    [
                        'name' => 'required|max:255',
                        'street_label' => 'required|max:255',
                        'street_detail' => 'max:255',
                        'zipcode' => 'required|max:10|string',
                        'city' => 'required|max:255',
                        'country' => 'required|max:255',
                    ];
            }
            case 'PATCH': {
                return
                    [
                        'name' => 'required|max:255',
                        'street_label' => 'required|max:255',
                        'street_detail' => 'max:255',
                        'zipcode' => 'required|max:10|string',
                        'city' => 'required|max:255',
                        'country' => 'required|max:255',
                    ];
            }

        }
    }
}
