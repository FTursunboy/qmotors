<?php

namespace App\Http\Resources\OneC;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            "type" => 'order',
            "service_id" => $this->tech_center_id,
            "order_id" => $this->id,
            "order_uuid" => $this->uuid,
            "user_id" => optional($this->user_car)->user_id,
            "car_id" => $this->user_car_id,
            "order_type" => optional($this->order_type_relation)->key,
            "desired_date" => $this->date,
            "description" => $this->description,
            "guarantee" => $this->guarantee,
            "photos" => $this->order_photos->map(function ($item) {
                return customAsset($item, 'photo');
            })->all(),
            "order_status" => $this->order_status,
            "order_new" => $this->order_new,
            "order_done" => $this->order_done,
            "order_close" => $this->order_close,
            "date" => $this->created_at,
            "number" => $this->order_number,
            "mileage" => $this->mileage,
            "sum" => $this->sum,
            "works" => $this->order_works,
            "parts" => $this->order_spares,
        ];
    }
}
