<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PendingDocumentsUploadRequest extends FormRequest
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
            'front_of_the_house' => 'required|mimes:jpg,bmp,png',
            'side_of_the_house' => 'required|mimes:jpg,bmp,png',
            'back_of_the_house' => 'required|mimes:jpg,bmp,png',
            'fuse_board' => 'required|mimes:jpg,bmp,png',
            'battery_and_inverter_position' => 'required|mimes:jpg,bmp,png',
            'electric_meter' => 'required|mimes:jpg,bmp,png',
            'inside_of_attic' => 'nullable|mimes:jpg,bmp,png',
            'electricity_bills' => 'nullable|mimes:jpg,bmp,png',
            'additional_images' => 'nullable|mimes:jpg,bmp,png',
        ];
    }
}
