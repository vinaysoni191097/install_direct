<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasePriceFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'price' => "required|min:1"
        ];
    }

    public function messages()
    {
        return [
            'price.required' => "Price field can't be null.",
            'price.min' => "Price field can't be set to 0 or in negative."
        ];
    }
}
