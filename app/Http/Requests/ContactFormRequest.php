<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'email' => 'required|min:1|max:255|email:rfc,dns',
            'address' => 'required|min:1|max:300',
            'company' => 'nullable',
            'phone' => 'nullable|min:1',
            'message' => 'required|min:1|max:500',
            'phone' => 'required|max:15',
        ];
    }
}
