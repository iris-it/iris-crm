<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Quote;

class UpdateQuoteRequest extends Request
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
        $quote = new Quote();
        return $quote->rules();
    }
}
