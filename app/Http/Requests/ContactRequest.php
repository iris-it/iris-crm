<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

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
        switch ($this->method()) {
            case 'POST': {
                return [

                    'civility' => 'string|between:2,3|required',
                    'lastname' => 'string|max:255|required',
                    'firstname' => 'string|max:255|required',
                    'post' => 'string|max:255|required',
                    'email' => ['required', 'email', 'max:255', Rule::unique('contacts', 'email')],
                    'phone_number' => ["regex:/^\+?[0-9]{10,20}$/im"],
                    'avatar' => 'string',
                    'free_label' => 'string',

                    /*Relations*/

                    'office_id' => 'integer',


                ];
            }
            case 'PUT': {
                return [

                    'civility' => 'string|between:2,3|required',
                    'lastname' => 'string|max:255|required',
                    'firstname' => 'string|max:255|required',
                    'post' => 'string|max:255|required',
                    'email' => ['required', 'email', 'max:255', Rule::unique('contacts', 'email')->ignore($this->id)],
                    'phone_number' => ["regex:/^\+?[0-9]{10,20}$/im"],
                    'avatar' => 'string',
                    'free_label' => 'string',

                    /*Relations*/

                    'office_id' => 'integer',


                ];
            }
        }
    }
}
