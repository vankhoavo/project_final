<?php

namespace App\Http\Requests\producttype;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_type_name_new'         => 'required|min:3|max:30',
            'slug_product_type_new'    => 'required|min:3|max:30|unique:product_types,slug_product_type_name',
        ];
    }
}
