<?php

namespace App\Http\Requests\producttype;

use Illuminate\Foundation\Http\FormRequest;

class CheckIDProductTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'    => 'required|exists:product_types,id',
        ];
    }
}
