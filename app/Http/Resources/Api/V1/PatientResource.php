<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
            'profile' => ProfileResource::make($this->whenLoaded('profile')),
            'blood_group' => $this->blood_group,
            'weight' => $this->weight,
            'height' => $this->height,
            'allergies' => $this->allergies,
            'medications' => $this->medications,
            'surgeries' => $this->surgeries,
            'diseases' => $this->diseases,
            'family_history' => $this->family_history,
            'emergency_contact_name' => $this->emergency_contact_name,
            'emergency_contact_phone' => $this->emergency_contact_phone,
            'emergency_contact_relationship' => $this->emergency_contact_relationship,
        ];
    }
}
