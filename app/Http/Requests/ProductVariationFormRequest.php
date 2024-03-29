<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductVariationFormRequest extends FormRequest
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
            'form.*.parent_product_id' => 'required',
            'form.*.title' => 'required|string|max:255',
            'form.*.price' => 'required|string|max:255',
            'form.*.stock' => 'required|numeric|min:1',
            'form.*.warranty' => 'required',
            'form.*.specification_value.*' => 'present|required',
            'form.*.specification_name.*' => 'present|required',
            'form.*.Kwh' => 'required',
            'form.*.featured_image' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'form.*.title.required' => 'The title field is required.',
            'form.*.price.required' => 'The Price field is required',
            'form.*.stock.required' => 'The stock field is required',
            'form.*.stock.min' => 'Stock should be greater than 1',
            'form.*.category.required' => 'Please select atleast one category',
            'form.*.warranty.required' => 'The warranty field is required',
            'form.*.specification_value.*.required' => 'The specification value field is required',
            'form.*.specification_name.*.required' => 'The specification name field is required',
        ];
    }
}
