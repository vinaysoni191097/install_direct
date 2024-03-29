<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsFormRequest extends FormRequest
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
            'page_headline' => 'required|max:200',
            'side_content' => 'required',
            'featured_image' => 'nullable',
            'main_content_title' => 'nullable|max:200',
            'main_content_tagline' => 'nullable|max:200',
            'main_content_section_one' => 'nullable',
            'main_content_section_two' => 'nullable',
            'main_content_section_three' => 'nullable',
        ];
    }
}
