<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'personal_details' => ProfileResource::make($this->profile),
            'speciality' => $this->speciality,
            'qualification' => $this->qualification,
            'experience' => $this->experience,
            'available_days' => $this->available_days ?? null,
            'consultation_fee' => $this->consultation_fee ?? null,
            'license_number' => $this->license_number ?? null,
            'bio' => $this->bio ?? null,
            'status' => $this->status,
            'link' => route('doctors.show', $this->id),
        ];
    }
}
