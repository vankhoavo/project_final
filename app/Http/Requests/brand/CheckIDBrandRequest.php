<?php

namespace App\Http\Requests\brand;

use Illuminate\Foundation\Http\FormRequest;

class CheckIDBrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'    => 'required|exists:brands,id',
        ];
    }
}
