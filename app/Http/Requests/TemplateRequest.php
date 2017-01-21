<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Template;

class TemplateRequest extends Request
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
                    'content' => 'string|required',

                ];
            }
            case 'PATCH': {
                return [

                    'name' => 'string|max:255|required',
                    'content' => 'string|required',
                ];
            }
        }
    }
}
