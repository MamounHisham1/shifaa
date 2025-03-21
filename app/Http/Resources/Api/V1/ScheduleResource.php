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
            'id' => $this->id,
            'doctor' => DoctorResource::make($this->doctor),
            'appointments' => $this->mergeWhen($this->relationLoaded('appointments'), AppointmentResource::collection($this->appointments)),
            'slots' => $this->mergeWhen($this->relationLoaded('slots'), SlotResource::collection($this->slots)),
            'slot_by_min' => $this->slot_by_min,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'status' => $this->status,
            'date' => $this->date,
            'is_available' => $this->is_available,
            'notes' => $this->notes,
            'max_appointments' => $this->max_appointments,
        ];
    }
}
