<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Organization;
use Illuminate\Validation\Rule;

class OrganizationRequest extends Request
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
                    'name' => 'required|max:255',
                    'address' => 'required|max:255',
                    'address_comp' => 'max:255',
                    'phone' => 'required|min:10',
                    'email' => 'email|max:255',
                    'website' => 'max:500',
                    'status' => 'required|string|max:255',
                    'siren_number' => ["regex:/^[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}$/im", Rule::unique('organizations', 'siren_number')],
                    'siret_number' => ['required', "regex:/^[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{5}$/im", Rule::unique('organizations', 'siret_number')],
                    'ape_number' => ['required', "regex:/^[0-9]{3,4}[a-zA-Z]{1}$/im"],
                    'tva_number' => ['required', "regex:/^[A-Z]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}$/im"],
                ];
            }
            case 'PATCH': {
                return [
                    'name' => 'required|max:255',
                    'address' => 'required|max:255',
                    'address_comp' => 'max:255',
                    'phone' => 'required|min:10',
                    'email' => 'email|max:255',
                    'website' => 'max:500',
                    'status' => 'required|string|max:255',
                    'siren_number' => ["regex:/^[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}$/im", Rule::unique('organizations', 'siren_number')],
                    'siret_number' => ['required', "regex:/^[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{5}$/im", Rule::unique('organizations', 'siret_number')],
                    'ape_number' => ['required', "regex:/^[0-9]{3,4}[a-zA-Z]{1}$/im"],
                    'tva_number' => ['required', "regex:/^[A-Z]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}$/im"],
                ];
            }
        }

    }
}
