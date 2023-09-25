<?php

namespace App\Http\Requests\invoice;

use Illuminate\Foundation\Http\FormRequest;

class CreateInvoiceRequets extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'recipient_name'    => 'required|min:2',
            'receiving_phone_number'    => 'required|numeric|digits:10',
            'receiving_address' => 'required|min:2',
        ];
    }
}
