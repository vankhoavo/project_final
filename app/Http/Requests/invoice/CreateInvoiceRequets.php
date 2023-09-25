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
            //
        ];
    }
}
