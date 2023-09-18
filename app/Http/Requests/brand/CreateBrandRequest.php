<?php

namespace App\Http\Requests\brand;

use Illuminate\Foundation\Http\FormRequest;

class CreateBrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'brand_name_new'   => 'required|min:3|max:20',
            'slug_name_new'  => 'required|min:3|max:20|unique:brands,slug_brand',
        ];
    }
}
