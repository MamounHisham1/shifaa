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
            'id' => $this->id,
            'personal_details' => ProfileResource::make($this->profile),
            'speciality' => $this->speciality,
            'qualification' => $this->qualification,
            'experience' => $this->experience,
            'available_days' => $this->available_days,
            'consultation_fee' => $this->consultation_fee,
            'license_number' => $this->license_number,
            'bio' => $this->bio,
            'status' => $this->status,
        ];
    }
}
