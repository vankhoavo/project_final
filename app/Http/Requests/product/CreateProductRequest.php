<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_name_new'  => 'required|min:3|max:200',
            'slug_product_name_new' => 'required|min:3|max:200|unique:products,slug_product',
            'image_new'  => 'required',
            'short_description_new'    => 'required|min:3',
            'detailed_description_new'    => 'required|min:3',
            'status_new'    => 'required|boolean',
            'price_sell_new'   => 'required|numeric|min:0|max:100000000000',
            'price_discount_new'    => 'required|numeric|min:0|max:100000000000|lte:price_sell_new',
            'product_type_name_new'  => 'required',
            'brand_name_new'    => 'required',
        ];
    }
}
