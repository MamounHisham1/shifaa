<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientsRequest extends FormRequest
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
            'profile_id' => ['required', 'integer', 'exists:profiles,id', 'unique:patients,profile_id', 'unique:doctors,profile_id'],
            'blood_group' => ['nullable', 'string', 'max:255'],
            'weight' => ['nullable', 'numeric'],
            'height' => ['nullable', 'numeric'],
            'allergies' => ['nullable', 'string', 'max:255'],
            'medications' => ['nullable', 'string', 'max:255'],
            'surgeries' => ['nullable', 'string', 'max:255'],
            'diseases' => ['nullable', 'string', 'max:255'],
            'family_history' => ['nullable', 'string', 'max:255'],
            'emergency_contact_name' => ['nullable', 'string', 'max:255'],
            'emergency_contact_phone' => ['nullable', 'string', 'max:255'],
            'emergency_contact_relationship' => ['nullable', 'string', 'max:255'],
        ];
    }
}
