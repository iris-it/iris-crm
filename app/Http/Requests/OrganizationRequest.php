<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Organization;

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

        return [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'address_comp' => 'max:255',
            'phone' => 'required|min:10',
            'email' => 'email|max:255',
            'website' => 'max:500',
            'status' => 'required|string|max:255',
            'siren_number' => array("regex:/^[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}$/im", 'unique:organizations,siren_number,' . $this->id),
            'siret_number' => array('required', "regex:/^[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{5}$/im", 'unique:organizations,siret_number,' . $this->id),
            'ape_number' => array('required', "regex:/(^[0-9]{1,2}\.[0-9]{1,2}[A-Z]$|^[0-9]{1,2}\.[0-9]{1,2})$/im"),
            'tva_number' => array('required', "regex:/^[A-Z]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}$/im"),
        ];

    }
}
