<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TechnicianFormRequest extends FormRequest
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
            'phone' => 'required|string|max:15',
            'email' => 'required|email:refs,dns',
            'address' => 'required|max:50',
            'country' => 'required|max:10',
            'city' => 'required|max:10',
            'state' => 'required|max:10',
            'zip' => 'required|max:8',
        ];
    }
}
