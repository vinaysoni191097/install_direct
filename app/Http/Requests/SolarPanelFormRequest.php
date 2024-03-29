<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolarPanelFormRequest extends FormRequest
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
            'title' => 'required',
            'watts' => 'required',
            'price' => 'required|min:1',
            'description' => 'required|string|max:300',
            'featured_image' => 'nullable|image'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'watts.required' => 'The watts field is required.',
            'price.required' => 'The price field is required.',
            'description.required' => 'The description field is required.',

        ];
    }
}
