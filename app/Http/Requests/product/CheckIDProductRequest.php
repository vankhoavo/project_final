<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class CheckIDProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'    => 'required|exists:products,id',
        ];
    }
}
