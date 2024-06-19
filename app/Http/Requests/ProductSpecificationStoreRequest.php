<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductSpecificationStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
//            'ProductST.*.order' => 'required',
            'ProductST.*.en.key' => 'required',
//            'ProductST.*.en.value1' => 'required',
//            'ProductST.*.en.value2' => 'required',
            'ProductST.*.ru.key' => 'required',
//            'ProductST.*.ru.value1' => 'required',
//            'ProductST.*.ru.value2' => 'required',
            'ProductST.*.uz.key' => 'required',
//            'ProductST.*.uz.value1' => 'required',
//            'ProductST.*.uz.value2' => 'required',
        ];
    }
}
