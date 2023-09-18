<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class CheckSlugProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'slug'  => 'required',
        ];
    }
}
