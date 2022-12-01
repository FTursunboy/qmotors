<?php

namespace App\Http\Resources\OneC;

use Illuminate\Http\Resources\Json\JsonResource;

class PushResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = json_decode($this->data, true);
        return [
            'type' => 'push',
            'service_id' => $this->service_id,
            'push_id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'text' => $this->text,
            'date' => $this->created_at
        ];
    }
}
