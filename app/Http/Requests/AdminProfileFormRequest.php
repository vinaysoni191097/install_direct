<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProfileFormRequest extends FormRequest
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
            'first_name' => 'required|min:1|max:255|regex:/^[A-Za-z\s]+$/',
            'last_name' => 'required|min:1|max:255|regex:/^[A-Za-z\s]+$/',
            'phone' => 'required|string|max:255|regex:/^[A-Za-z\s]+$/',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'The first name field is required.',
            'last_name.required' => 'The last name field is required.',
            'first_name.regex' => 'Numeric and special characters are not allowed.',
            'last_name.regex' => 'Numeric and special characters are not allowed.',
        ];
    }
}
