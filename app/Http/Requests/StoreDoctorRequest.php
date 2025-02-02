<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
            'profile_id' => ['required', 'integer', 'exists:profiles,id', 'unique:doctors,profile_id', 'unique:patients,profile_id'], 
            'speciality' => ['required', 'string', 'max:255'],
            'qualification' => ['required', 'string'],
            'experience' => ['required', 'string', 'max:255'],
            'available_days' => ['nullable', 'string', 'max:255'], 
            'consultation_fee' => ['nullable', 'integer', 'min:0'],
            'license_number' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'status' => ['required', 'string', 'in:active,inactive']
        ];
    }
}
