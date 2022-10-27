<?php

namespace App\Services;

use App\Models\OneSLog;
use App\Services\Contracts\OneCServiceInterface;
use Illuminate\Support\Facades\Http;

class OneCService implements OneCServiceInterface
{
    private $config;
    public function __construct()
    {
        $this->config = collect(config('1c'));
        // $this->startSession();
    }
    public function registerUser($model)
    {
        return $this->send([
            'type' => 'user',
            'user_id' => $model->id,
            'phone' => filterPhone2($model->phone_number)
        ]);
    }
    public function updateUser($model)
    {
        return $this->send([
            'type' => 'user',
            'user_id' => $model->id,
            'phone' => filterPhone2($model->phone_number),
            'fio' => $model->full_name,
            'fio_1' => $model->name,
            'fio_2' => $model->surname,
            'fio_3' => $model->patronymic,
            'gender' => $model->gender_key,
            'birthday' => $model->birthday,
            'email' => $model->email,
            'contact_phone' => filterPhone2($model->additional_phone_number),
            'photo' => $model->avatar,
            'agr_sms'=>$model->agree_sms,
            'agr_push'=>$model->agree_notification,
            'agr_data'=>$model->agree_data,
            'agr_calls'=>$model->agree_calls,
        ]);
    }
    public function car($model)
    {
        return $this->send([
            'type' => 'car',
            'car_id' => $model->id,
            'user_id' => $model->user_id,
            'brand' => optional(optional($model->model)->mark)->name,
            'model' => optional($model->model)->name,
            'vin' => $model->vin,
            'year' => $model->year,
            'mileage' => $model->mileage,
            'date' => $model->last_visit,
            'photos' => $model->user_car_photos->pluck('photo')->all()
        ]);
    }

    public function send($data)
    {
        $body = [
            'service_id' => $this->config['service_id'],
            'lines' => [$data]
        ];
        $response = Http::withHeaders([
            'Secret' => $this->config['Secret']
        ])->post($this->config['URL'], $body);
        // dd($response->body(), $response->status(), [
        //     'service_id' => $this->config['service_id'],
        //     'lines' => $data
        // ]);
        OneSLog::create([
            'type' => $data['type'],
            'data' => json_encode($body, JSON_UNESCAPED_SLASHES),
            'response' => json_encode($response->body(), JSON_UNESCAPED_SLASHES),
            'status' => $response->status()
        ]);
        return $response->status();
    }
}
