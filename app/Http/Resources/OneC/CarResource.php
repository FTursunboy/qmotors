<?php

namespace App\Http\Resources\OneC;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'type' => 'car',
            'car_id' => $this->id,
            'user_id' => $this->user_id,
            'brand' => optional(optional($this->model)->mark)->name,
            'model' => optional($this->model)->name,
            'vin' => $this->vin,
            'year' => $this->year,
            'mileage' => $this->mileage,
            'photos' => $this->all_photos,
            'date' => $this->last_visit,
        ];
    }
}
