<?php

namespace App\Http\Requests\warehouse;

use Illuminate\Foundation\Http\FormRequest;

class CheckIDWareHouseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'    =>  'required|exists:warehouses,id',
        ];
    }
}
