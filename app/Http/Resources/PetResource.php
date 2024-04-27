<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
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
            'customerId' => $this->customer_id,
            'name' => $this->name,
            'breed' => $this->breed,
            'age' => $this->age,
            'color' => $this->color,
            'sex' => $this->sex,
            'isBreed' => $this->is_ready_to_breed,
        ];
    }
}
