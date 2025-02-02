<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'patient' => PatientResource::make($this->patient),
            'appointment_datetime' => $this->appointment_datetime,
            'status' => $this->status,
            'visit_type' => $this->visit_type,
            'reason_for_visit' => $this->reason_for_visit,
            'type' => $this->type,
            'notes' => $this->notes,
            'cancellation_reason' => $this->cancellation_reason,
            'is_confirmed' => $this->is_confirmed,
        ];
    }
}
