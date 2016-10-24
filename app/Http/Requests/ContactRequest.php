<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request
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

            'civility' => 'string|between:2,3|required',
            'lastname' => 'string|max:255|required',
            'firstname' => 'string|max:255|required',
            'post' => 'string|max:255|required',
            'email' => 'required|email|max:255|unique:contacts,email,' . $this->id,
            'phone_number' => array("regex:/^\+?[0-9]{10,20}$/im"),
            'avatar' => 'string',
            'address' => 'string|max:255|required',
            'zipcode' => 'string|max:255|required',
            'city' => 'string|max:255|required',
            'country' => 'string|max:255|required',
            'type' => 'boolean',
            'free_label' => 'string',

            /*Relations*/

            'office_id' => 'integer',



        ];
    }
}
