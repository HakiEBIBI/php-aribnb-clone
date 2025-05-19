<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'postal_code' => 'required|string',
            'price_per_night' => 'required|numeric',
            'max_number_of_people' => 'required|numeric',
            'address' => 'required|string',
            'city' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,svg',
        ];
    }
}
