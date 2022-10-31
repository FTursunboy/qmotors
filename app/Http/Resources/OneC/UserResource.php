<?php

namespace App\Http\Resources\OneC;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'type' => 'user',
            'user_id' => $this->id,
            'phone' => filterPhone2($this->phone_number),
            'fio' => $this->full_name,
            'fio_1' => $this->name,
            'fio_2' => $this->surname,
            'fio_3' => $this->patronymic,
            'gender' => $this->gender_key,
            'birthday' => $this->birthday,
            'email' => $this->email,
            'contact_phone' => filterPhone2($this->additional_phone_number),
            'photo' => $this->avatar,
            'agr_sms' => $this->agree_sms,
            'agr_push' => $this->agree_notification,
            'agr_data' => $this->agree_data,
            'agr_calls' => $this->agree_calls,
        ];
    }
}