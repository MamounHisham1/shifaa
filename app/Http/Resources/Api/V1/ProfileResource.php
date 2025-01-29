<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            ...UserResource::make($this->user)->toArray($request),
            'avatar' => $this->avatar,
            'address' => $this->address ?? null,
            'country' => $this->country ?? null,
            'state' => $this->state ?? null,
            'city' => $this->city ?? null,
            'street' => $this->street ?? null,
        ];
    }
}
