<?php

namespace App\Http\Resources\OneC;

use Illuminate\Http\Resources\Json\JsonResource;

class BonusResource extends JsonResource
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
            'type' => 'bonus',
            'bonus_id' => $this->id,
            'comment' => $this->title,
            'bonus_uuid' => $this->bonus_uuid,
            'date' => $this->created_at,
            'user_id' => intval($this->user_id),
            'bonus_type' => $this->bonus_type,
            'order_id' => $this->order_id,
            'count' => $this->points,
//            'burn_date' => $this->burn_date,
//            'burn_count' => User::find($this->user_id)->balance
        ];
    }
}
