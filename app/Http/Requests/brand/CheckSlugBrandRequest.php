<?php

namespace App\Http\Requests\brand;

use Illuminate\Foundation\Http\FormRequest;

class CheckSlugBrandRequest extends FormRequest
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
