<?php

namespace App\Http\Resources\TechCenter;

use Illuminate\Http\Resources\Json\JsonResource;

class TechCentersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'address' => $this->address,
            'phone' => $this->phone,
            'lat' => $this->lat,
            'lng' => $this->lng,
        ];
    }
}
