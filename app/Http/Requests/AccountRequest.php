<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AccountRequest extends Request
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
            case 'POST' : {

                return
                    [
                        'name' => 'required|max:255',
                        'website' => 'max:255',
                        'image' => 'image|mimes:jpg,jpeg,png,gif|max:50000',
                        'crop_options' => 'string',
                        'is_lead' => 'boolean',
                        'converted' => 'boolean',

                    ];

            }
            case 'PATCH' : {

                return
                    [
                        'name' => 'required|max:255',
                        'website' => 'max:255',
                        'image' => 'image|mimes:jpg,jpeg,png,gif|max:50000',
                        'crop_options' => 'string',
                        'is_lead' => 'boolean',
                        'converted' => 'boolean',

                    ];

            }

        }


    }
}
