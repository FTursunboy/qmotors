<?php

namespace App\Services;

use App\Http\Resources\OneC\BonusResource;
use App\Http\Resources\OneC\CarResource;
use App\Http\Resources\OneC\ChatResource;
use App\Http\Resources\OneC\OrderResource;
use App\Http\Resources\OneC\PushResource;
use App\Http\Resources\OneC\UserResource;
use App\Jobs\ProcessPushNotification;
use App\Models\Bonus;
use App\Models\CarMark;
use App\Models\CarModel;
use App\Models\Chat;
use App\Models\ChatMessages;
use App\Models\Notification;
use App\Models\OneSLog;
use App\Models\Order;
use App\Models\OrderPhoto;
use App\Models\OrderSpare;
use App\Models\OrderType;
use App\Models\OrderWork;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserCar;
use App\Models\UserCarPhoto;
use App\Services\Contracts\OneCServiceInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
            'type' => 'reg',
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
//        dd($data);
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
        $message = Setting::firstOrCreate(['key' => 'msg_id']);
        $msg_id = $message->value ?? 0;
        $body = [
            'id' => $this->config['service_id'],
            'clear' => $msg_id,
        ];
        $response = Http::withHeaders([
            'Secret' => $this->config['Secret']
        ])->get($this->config['URL'], $body);
        $res = json_decode($response->body(), true);
//        dd($res['lines']);
        OneSLog::create([
            'type' => 'receive',
            'data' => json_encode($body, JSON_UNESCAPED_SLASHES),
            'response' => json_encode($response->body(), JSON_UNESCAPED_SLASHES),
            'status' => $response->status()
        ]);
        if (isset($res['lines'])) {

            foreach ($res['lines'] as $item) {
//            dd($item);
                switch ($item['msg_type']) {
                    case 'chat':
                        $this->receiveChat($item['data']);
                        break;
                    case 'user':
                        $this->receiveUser($item['data']);
                        break;
                    case 'push':
                        $this->receivePush($item['data']);
                        break;
                    case 'order':
                        $this->receiveOrder($item['data']);
                        break;
                    case 'bonus':
                        $this->receiveBonus($item['data']);
                        break;
                    case 'car':
                        $this->receiveCar($item['data']);
                        break;
                    default:
                        break;
                }
                if ($item['msg_id'] > $msg_id) $msg_id = $item['msg_id'];
            }
        }
        $message->value = $msg_id;
        $message->save();

//        dd([
//            $response->body(),
//            $response->status(),
//            'service_id' => $this->config['service_id'],
//            'lines' => $body
//        ]);
        Log::channel('1C')->info($response);

        return $response->status();
    }

    private function format($data)
    {
        return $data->toArray(request());
    }

    private function receiveChat($data)
    {
        ChatMessages::withoutEvents(function () use ($data) {
            if ($data['user_id'] != null && User::where('id', $data['user_id'])->exists()) {
                ChatMessages::updateOrCreate([
                    'chat_id' => Chat::firstOrCreate(['user_id' => $data['user_id']])->id,
                    'uuid' => $data['chat_id']
//                'id' => $data['chat_id']
                ], [
                    'message' => $data['text'],
                    'photo' => $data['image'],
                    'video' => $data['video'],
                    'user_id' => $data['incoming'] ? $data['user_id'] : null,
                    'admin_user_id' => !$data['incoming'] ? 1 : null,
                    'created_at' => $data['date']
                ]);
            }
        });
    }

    private function receiveUser($data)
    {
        User::withoutEvents(function () use ($data) {
            $user = User::firstOrNew(['id' => $data['user_id'] ?? User::nextID()]);
            if (!empty($data['phone'])) $user->phone_number = buildPhone($data['phone']);
            if (!empty($data['fio_1'])) $user->name = $data['fio_1'];
            if (!empty($data['fio_2'])) $user->surname = $data['fio_2'];
            if (!empty($data['fio_3'])) $user->patronymic = $data['fio_3'];
            if (!empty($data['gender'])) $user->gender = $data['gender'] == 'female' ? 0 : 1;
            if (!empty($data['birthday'])) $user->birthday = $data['birthday'];
            if (!empty($data['email'])) $user->email = $data['email'];
            if (!empty($data['contact_phone'])) $user->additional_phone_number = buildPhone($data['contact_phone']);
            if (!empty($data['agr_sms'])) $user->agree_sms = $data['agr_sms'];
            if (!empty($data['agr_push'])) $user->agree_notification = $data['agr_push'];
            if (!empty($data['agr_mobile'])) $user->agree_data = $data['agr_mobile'];
            if (!empty($data['agr_call'])) $user->agree_calls = $data['agr_call'];
            $user->save();
//            User::updateOrCreate([
//                'id' => $data['user_id'] ?? User::nextID()
//            ], [
//                'phone_number' => buildPhone($data['phone']),
//                'name' => $data['fio_1'],
//                'surname' => $data['fio_2'],
//                'patronymic' => $data['fio_3'],
//                'gender' => $data['gender'] == 'female' ? 0 : 1,
//                'birthday' => $data['birthday'],
//                'email' => $data['email'],
//                'additional_phone_number' => buildPhone($data['contact_phone']),
////                'avatar' => $data['photo'],
//                'agree_sms' => $data['agr_sms'],
//                'agree_notification' => $data['agr_push'],
//                'agree_data' => $data['agr_mobile'],
//                'agree_calls' => $data['agr_call'],
//            ]);
        });
    }

    private function receivePush($data)
    {
        $model = Notification::updateOrCreate([
            'id' => is_integer($data['push_id']) ? $data['push_id'] : Notification::nextID()
        ], [
            'service_id' => $data['service_id'],
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'text' => $data['text'],
            'created_at' => $data['date'] ?? date('Y-m-d H:i:s'),
        ]);
        if (!is_integer($data['push_id'])) {
            $model->update([
                'push_uuid' => $data['push_id'],
            ]);
            ProcessPushNotification::dispatch(
                collect(['send' => true, 'user_id' => $model->user_id]),
                $model,
                ['title' => 'Новое уведомление', 'body' => $model->title]
            );
        }
    }

    private function receiveOrder($data)
    {
        $order_type = OrderType::firstOrNew(['key' => $data['order_type']]);
        $order_type->id = $order_type->id ?? OrderType::nextID();
        $order_type->save();
//        Order::withoutEvents(function () use ($data, $order_type) {
        $model = Order::updateOrCreate([
            'id' => is_integer($data['order_id']) ? $data['order_id'] : Order::nextID()
        ], [
//            'uuid' => $data['order_uuid'],
            'tech_center_id' => $data['service_id'],
            'user_car_id' => $data['car_id'],
            'order_type_id' => $order_type->id,
            'date' => $data['desired_date'],
            'description' => $data['description'],
            'guarantee' => $data['guarantee'],
            'order_status' => $data['order_status'],
            'order_number' => $data['number'],
            'mileage' => $data['mileage'],
            'sum' => $data['sum'],
            'order_new' => $data['order_new'],
            'order_close' => $data['order_close'],
            'order_done' => $data['order_done'],
        ]);
//        });
        if (!is_integer($data['order_id'])) {
            $model->update([
                'uuid' => $data['order_id'],
            ]);
        }
        OrderPhoto::withoutEvents(function () use ($data, $model) {
            foreach ($data['photos'] as $item) {
                OrderPhoto::updateOrCreate([
                    'order_id' => $model->id,
                    'photo' => $item
                ], []);
            }
        });

        foreach ($data['works'] as $item) {
            OrderWork::updateOrCreate([
                'order_id' => $model->id,
                'title' => $item['name']
            ], [
                'count' => $item['count'],
                'hours' => $item['hours'],
                'price' => $item['price'],
                'sum' => $item['sum'],
            ]);
        }
        foreach ($data['parts'] as $item) {
            OrderSpare::updateOrCreate([
                'order_id' => $model->id,
                'title' => $item['name']
            ], [
                'count' => $item['count'],
                'price' => $item['price'],
                'sum' => $item['sum'],
            ]);
        }
    }

    private function receiveBonus($data)
    {
        $model = Bonus::find(is_integer($data['bonus_id']) ? $data['bonus_id'] : Bonus::nextID());
        if ($model) {
            $model = Bonus::create([
                'user_id' => $data['user_id'],
                'title' => $data['comment'],
                'bonus_type' => $data['bonus_accrual_id'] ? 'burn' : $data['bonus_type'],
                'points' => $data['count'],
                'burn_count' => $data['burn_count'],
                'burn_date' => $data['burn_date'],
                'bonus_accrual_id' => $data['bonus_accrual_id'],
            ]);
        } else {
            $model->update([
                'user_id' => $data['user_id'],
                'title' => $data['comment'],
                'bonus_type' => $data['bonus_accrual_id'] ? 'burn' : $data['bonus_type'],
                'points' => $data['count'],
                'burn_count' => $data['burn_count'],
                'burn_date' => $data['burn_date'],
                'bonus_accrual_id' => $data['bonus_accrual_id'],
            ]);
        }
//        Bonus::withoutEvents(function () use ($data) {
//        $model = Bonus::updateOrCreate([
//            'id' => is_integer($data['bonus_id']) ? $data['bonus_id'] : Bonus::nextID()
//        ], [
//            'user_id' => $data['user_id'],
//            'title' => $data['comment'],
//            'bonus_type' => $data['bonus_accrual_id'] ? 'burn' : $data['bonus_type'],
//            'points' => $data['count'],
//            'burn_count' => $data['burn_count'],
//            'burn_date' => $data['burn_date'],
//            'bonus_accrual_id' => $data['bonus_accrual_id'],
//        ]);
//        });
        if (!is_integer($data['bonus_id'])) {
            $model->update([
                'bonus_uuid' => $data['bonus_id'],
            ]);
        }
    }

    private function receiveCar($data)
    {
        $mark = CarMark::firstOrCreate(['name' => $data['brand']], [
            'id' => CarMark::nextID()
        ]);
        $model = CarModel::firstOrCreate(['car_mark_id' => $mark->id, 'name' => $data['model']], [
            'id' => CarModel::nextID()
        ]);
//        UserCar::withoutEvents(function () use ($data, $model) {

        $model = UserCar::find(is_integer($data['car_id']) ? $data['car_id'] : UserCar::nextID());
        if ($model) {
            $model = UserCar::create([
                'vin' => $data['vin'],
                'user_id' => $data['user_id'],
                'car_model_id' => $model->id,
                'year' => $data['year'],
                'last_visit' => $data['date'],
                'mileage' => $data['mileage'],
                'number' => $data['car_number'],
                'status' => $data['status'],
            ]);
        } else {
            $model->update([
                'vin' => $data['vin'],
                'user_id' => $data['user_id'],
                'car_model_id' => $model->id,
                'year' => $data['year'],
                'last_visit' => $data['date'],
                'mileage' => $data['mileage'],
                'number' => $data['car_number'],
                'status' => $data['status'],
            ]);
        }
//        $model = UserCar::updateOrCreate([
//            'id' => is_integer($data['car_id']) ? $data['car_id'] : UserCar::nextID(),
//        ], [
//            'vin' => $data['vin'],
//            'user_id' => $data['user_id'],
//            'car_model_id' => $model->id,
//            'year' => $data['year'],
//            'last_visit' => $data['date'],
//            'mileage' => $data['mileage'],
//            'number' => $data['car_number'],
//            'status' => $data['status'],
//        ]);
//        });

        UserCarPhoto::withoutEvents(function () use ($data, $model) {
            foreach ($data['photos'] as $item) {
                UserCarPhoto::updateOrCreate([
                    'user_car_id' => $model->id,
                    'photo' => $item
                ], ['id' => UserCarPhoto::nextID()]);
            }
        });
        if (!is_integer($data['car_id'])) {
            $this->car($model);
        }
    }
}
