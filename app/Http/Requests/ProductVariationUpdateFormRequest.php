<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductVariationUpdateFormRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        return [
            'price' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'stock' => 'required|numeric|min:1',
            'warranty' => 'required',
            'specification_value.*' => 'present|required',
            'specification_name.*' => 'present|required',
            'Kwh' => 'required',
            'featured_image' => 'nullable|mimes:jpg,bmp,png',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'price.required' => 'The Price field is required',
            'stock.required' => 'The stock field is required',
            'stock.min' => 'Stock should be greater than 1',
            'category.required' => 'Please select atleast one category',
            'warranty.required' => 'The warranty field is required',
            'specification_value.*.required' => 'The specification value field is required',
            'specification_name.*.required' => 'The specification name field is required',
        ];
    }
}
