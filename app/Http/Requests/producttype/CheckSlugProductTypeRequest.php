<?php

namespace App\Http\Requests\producttype;

use Illuminate\Foundation\Http\FormRequest;

class CheckSlugProductTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'slug'  =>  'required',
        ];
    }
}
