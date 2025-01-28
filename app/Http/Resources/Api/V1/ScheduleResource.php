<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'doctor' => DoctorResource::make($this->doctor),
            'appointments' => AppointmentResource::collection($this->appointments),
            'date' => $this->date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'status' => $this->status,
            'is_available' => $this->is_available,
            'notes' => $this->notes,
            'max_appointments' => $this->max_appointments,
            'link' => route('schedules.show', $this->id),
        ];
    }
}
