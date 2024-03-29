<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamMemberFormRequest extends FormRequest
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
            'first_name' => 'required|max:255|regex:/^[A-Za-z\s]+$/',
            'last_name' => 'required|max:255|regex:/^[A-Za-z\s]+$/',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|max:15|regex:/^[\d\s\+\(\)]+$/',
            'designation' => 'required|max:50',
            'description' => 'required|max:100',
            'twitter_url' => 'nullable',
            'linkedIn_url' => 'nullable',
            'featured_image' => 'nullable|image'
        ];
    }

    public function messages()
    {
        return [
            'phone.regex' => 'Only + and spaces are allowed',
        ];
    }
}
