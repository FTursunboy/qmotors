<?php

namespace App\Http\Resources\OneC;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
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
            'type' => 'chat',
            'service_id' => $this->tech_center_id,
            'chat_id' => $this->chat_id,
            'user_id' => $this->chat->user_id,
            'order_id' => $this->order_id,
            'text' => $this->message,
            'date' => $this->created_at,
            'incoming' => $this->admin_user_id == null,
            'image' => $this->photo,
            'video' => $this->video
        ];
    }
}
