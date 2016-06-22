<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Invoice;

class CreateInvoiceRequest extends Request
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
        $invoice = new Invoice();
        return $invoice->rules();
    }
}
