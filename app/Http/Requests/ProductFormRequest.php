<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductFormRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|numeric|min:1',
            'category' => 'required',
            'warranty' => 'required|numeric|min:1',
            'specification_value.*' => 'present|required',
            'specification_name.*' => 'present|required',
            'Kwh' => 'required|min:1',
            'inverter_compatibility' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'description.required' => 'The description field is required.',
            'specifications.required' => 'The short description field is required.',
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
