<?php

namespace App\Http\Requests;

use App\Office;
use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class OfficeRequest extends Request
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
                    'name' => ['required', 'max:255', Rule::unique('offices', 'name')],
                    'website' => 'string|max:255',
                    'activity_sector' => 'string|max:255',
                    'workforce' => 'integer',
                    'type' => 'required|string|max:255',
                    'ape_number' => ['required', "regex:/(^[0-9]{1,2}\.[0-9]{1,2}[A-Z]$|^[0-9]{1,2}\.[0-9]{1,2})$/im"],
                    'siret_number' => ['required', "regex:/^[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{5}$/im", Rule::unique('offices', 'siret_number')],
                    'phone_number' => ["regex:/^\+?[0-9]{10,20}$/im"],
                    'is_main' => 'required|boolean',
                    'is_active' => 'required|boolean',
                    'free_label' => 'string',

                    'addresses.*' => '',
                ];
            }
            case 'PATCH': {
                return [
                    'name' => ['required', 'max:255', Rule::unique('offices', 'name')->ignore($this->id)],
                    'website' => 'string|max:255',
                    'activity_sector' => 'string|max:255',
                    'workforce' => 'integer',
                    'type' => 'required|string|max:255',
                    'ape_number' => ['required', "regex:/(^[0-9]{1,2}\.[0-9]{1,2}[A-Z]$|^[0-9]{1,2}\.[0-9]{1,2})$/im"],
                    'siret_number' => ['required', "regex:/^[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{5}$/im", Rule::unique('offices', 'siret_number')->ignore($this->id)],
                    'phone_number' => ["regex:/^\+?[0-9]{10,20}$/im"],
                    'is_main' => 'required|boolean',
                    'is_active' => 'required|boolean',
                    'free_label' => 'string',

                    'addresses.*' => '',
                ];
            }
        }
    }

}
