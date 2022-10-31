<?php

namespace App\Services;

use App\Http\Resources\OneC\BonusResource;
use App\Http\Resources\OneC\CarResource;
use App\Http\Resources\OneC\ChatResource;
use App\Http\Resources\OneC\OrderResource;
use App\Http\Resources\OneC\PushResource;
use App\Http\Resources\OneC\UserResource;
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

    public function registerUser($model): int
    {
        return $this->send([
            'type' => 'user',
            'user_id' => $model->id,
            'phone' => filterPhone2($model->phone_number)
        ]);
    }

    public function updateUser($model): int
    {
        return $this->send($this->format(new UserResource($model)));
    }

    public function push($model): int
    {
        return $this->send($this->format(new PushResource($model)));
    }

    public function order($model): int
    {
        return $this->send($this->format(new OrderResource($model)));
    }

    public function user($model): int
    {
        return $this->send($this->format(new UserResource($model)));
    }

    public function car($model): int
    {
        return $this->send($this->format(new CarResource($model)));
    }

    public function chat($model): int
    {
        return $this->send($this->format(new ChatResource($model)));
    }

    public function bonus($model): int
    {
        return $this->send($this->format(new BonusResource($model)));
    }

    public function send($data): int
    {
        $body = [
            'service_id' => $this->config['service_id'],
            'lines' => [$data]
        ];
        $response = Http::withHeaders([
            'Secret' => $this->config['Secret']
        ])->post($this->config['URL'], $body);

        OneSLog::create([
            'type' => $data['type'],
            'data' => json_encode($body, JSON_UNESCAPED_SLASHES),
            'response' => json_encode($response->body(), JSON_UNESCAPED_SLASHES),
            'status' => $response->status()
        ]);
        return $response->status();
    }

    public function receive($data = []): int
    {
        $body = [
            'service_id' => $this->config['service_id'],
            'clear' => 0,
        ];
        $response = Http::withHeaders([
            'Secret' => $this->config['Secret']
        ])->get($this->config['URL'], $body);

        dd([
            $response->body(),
            $response->status(),
            'service_id' => $this->config['service_id'],
            'lines' => $body
        ]);
        
        return $response->status();
    }

    private function format($data)
    {
        return $data->toArray(request());
    }
}
