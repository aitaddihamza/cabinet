<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDoctorRequest extends FormRequest
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
            'firstname' => ['required', 'string', 'min:2'],
            'lastname' => ['required', 'string', 'min:2'],
            'specialite' => ['required', 'string', 'min:4'],
            'cin' => ['required', 'min:3', 'string', Rule::unique('users', 'cin')->ignore(request()->route()->parameter('doctor'))],
            'phone' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore(request()->route()->parameter('doctor'))],
            'password' => ['nullable', 'confirmed', 'min:4']
        ];
    }
}
