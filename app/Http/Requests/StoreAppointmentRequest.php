<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
            'patient_id' => ['required', 'exists:patients,id'],
            'schedule_id' => ['required', 'exists:schedules,id'],
            'status' => ['sometimes', 'string', 'in:scheduled,rescheduled,cancelled,completed'],
            'reason_for_visit' => ['required', 'string', 'max:500'],
            'visit_type' => ['required', 'string', 'in:new,follow-up'],
            'type' => ['required', 'string', 'in:in-person,remote'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
