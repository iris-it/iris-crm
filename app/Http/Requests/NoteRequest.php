<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class NoteRequest extends Request
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
                    'entity' => '',
                    'entity_id' => '',
                    'title' => 'required|string|max:250',
                    'body' => 'required|string|max:5000',
                ];
            }
            case 'PUT': {
                return [
                    'entity' => '',
                    'entity_id' => '',
                    'title' => 'required|string|max:250',
                    'body' => 'required|string|max:5000',
                ];
            }
        }

        return [];
    }
}
