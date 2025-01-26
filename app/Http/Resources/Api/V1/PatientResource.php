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
            'personal_details' => UserResource::make($this->user),
            'blood_group' => $this->blood_group ?? null,
            'genotype' => $this->genotype ?? null,
            'weight' => $this->weight ?? null,
            'height' => $this->height ?? null,
            'allergies' => $this->allergies ?? null,
            'medications' => $this->medications ?? null,
            'surgeries' => $this->surgeries ?? null,
            'diseases' => $this->diseases ?? null,
            'family_history' => $this->family_history ?? null,
            'emergency_contact_name' => $this->emergency_contact_name ?? null,
            'emergency_contact_phone' => $this->emergency_contact_phone ?? null,
            'emergency_contact_relationship' => $this->emergency_contact_relationship ?? null,
        ];
    }
}
