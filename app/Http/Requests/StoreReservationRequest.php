<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
            'arrival_date' => 'required|date|after:tomorrow',
            'departure_date' => 'required|date|after:arrival_date',
            'traveler_number' => 'required|integer',
        ];
    }

    protected function prepareForValidation(): void

    {


        $dateparts = explode(' to ', $this->dates);
        $this->merge([
            'arrival_date' => $dateparts[0] ?? '',
            'departure_date' => $dateparts[1] ?? ''

        ]);

    }
}
