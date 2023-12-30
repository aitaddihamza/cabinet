<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorSearchRequest extends FormRequest
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
            'firstname' => ['nullable', 'string', 'min:0'],
            'cin' => ['nullable', 'min:0', 'string'],
            'phone' => ['nullable', 'numeric', 'min:0'],
            'date_reservation' => ['nullable', 'date'],
            'heure_reservation' => ['nullable']
        ];
    }
}
