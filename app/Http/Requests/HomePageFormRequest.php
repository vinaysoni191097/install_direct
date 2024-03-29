<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomePageFormRequest extends FormRequest
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
            'banner_headline' => 'required|max:200',
            'banner_tagline' => 'required|max:200',
            'banner_image' => 'nullable|mimes:jpg,bmp,png',
            'specification_name.*' => 'present|required',
            'center_banner_image' => 'nullable|mimes:jpg,bmp,png',
            'center_banner_text' => 'nullable',
            'center_banner_headline' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'banner_headline.required' => 'Please add banner text headline.',
            'banner_tagline.required' => 'Please add banner text tagline.',
            'banner_headline.max' => "Headline can't exceed more than 200 characters.",
            'banner_tagline.max' => "Tagline can't exceed more than 200 characters.",
            'banner_image' => 'Please add banner Image',
            'specification_name.*' => 'Please add atleast one key feature.',
        ];
    }
}
