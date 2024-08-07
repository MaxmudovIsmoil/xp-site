<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverUpdateRequest extends FormRequest
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
            'system' => "required",
            'name_en' => 'required',
            'name_ru' => 'required',
            'name_uz' => 'required',
            'description_en' => 'required',
            'description_ru' => 'required',
            'description_uz' => 'required',
        ];
    }
}
