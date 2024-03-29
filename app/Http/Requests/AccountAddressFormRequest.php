<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountAddressFormRequest extends FormRequest
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
            'shippingFullName' => 'required|min:1|max:255|regex:/^[A-Za-z\s]+$/',
            'phone_number' => 'required|min:10|max:15',
            'city' => 'required',
            'state' => 'required',
            'shippingAddress2' => 'required',
            'zip' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'shippingFullName.required' => 'The first name field is required.',
            'shippingFullName.regex' => 'Numeric and special characters are not allowed.',
            'phone_number.required' => 'The phone number field is required.',
            'city.required' => 'Please select atleast one city.',
            'state.required' => 'Please select atleast one country.',
        ];
    }
}
