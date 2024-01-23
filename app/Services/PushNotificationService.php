<?php

namespace App\Services;

use App\Models\FirebaseLog;
use App\Models\Notification;
use App\Models\User;
use App\Services\Contracts\PushNotificationServiceInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PushNotificationService implements PushNotificationServiceInterface
{
    const FCM_URL = 'https://fcm.googleapis.com/fcm/send';
    const SERVER_KEY = 'AAAA-i9DEAA:APA91bFHskdG8QCm6rLIyOLzYiiC9RONVkIFRA8iNLu0TEZpWcS2vkvTVG3HNnFxk5px7wHfn4w9DIgYpMp3i6oe1jB5LnHMCWsZW1r6G1ONgkomeUFbW5JfwRK6FRY-JOW0oiqdCIci';
    const HEADERS = [
        'Authorization: key=' . self::SERVER_KEY,
        'Content-Type: application/json',
    ];
    public $class;
    public $request;

    public function __construct()
    {
        $this->class = Notification::class;
        $this->request = request();
    }

    public function setDeviceToken($request)
    {
        auth()->user()->update(['fcmtoken' => $request->token]);
        return 'Токен успешно сохранен.';
    }

    public static function send($request, $model, $notification = ['title' => 'Test', 'body' => 'Test'], $user_id = null)
    {
        if (isset($request['send']) && $request['send'] == 1 || $request['user_id']) {

            if (!isset($request['user_id'])) {
                $request['user_id'] = null;
            }
            if ($user_id == null && $request['user_id'] !== null) {
                $user_id = $request['user_id'];
            }

            if ($user_id == null) {
                $registration_ids = User::orderBy('id')->whereNotNull('fcmtoken')->get()->pluck('fcmtoken')->all();
            } else {
                $registration_ids = User::where('id', $user_id)->get()->pluck('fcmtoken')->all();
            }
            if (isset($request->user_id)) {
                $registration_ids = User::where('id', $request->user_id)->pluck('fcmtoken')->all();
            }


//            PushNotification::create([
//                'service_id' => config('1c')['service_id'],
//                'user_id' => $user_id ?? 0,
//                'title' => $notification['title'],
//                'text' => $notification['body'],
//                'date' => date('Y-m-d H:i:s')
//            ]);

            $chunks = array_chunk($registration_ids, 1000);
            foreach ($chunks as $tokens) {
                $data = [
                    "registration_ids" => $tokens,
                    "data" => $model,
                    "notification" => $notification,
                    "content_available" => true,
                    "priority" => "high",
                ];


                $dataString = json_encode($data, JSON_UNESCAPED_SLASHES);

                $CM_URL = 'https://fcm.googleapis.com/fcm/send';
                $HEADERS = [
                    'Authorization' => 'key=' . self::SERVER_KEY,
                    'Content-Type' => 'application/json',
                ];


                $response = Http::withHeaders($HEADERS)
                    ->post($CM_URL, $data);


                FirebaseLog::create([
                    'fcmtokens' => json_encode($tokens),
                    'data' => $dataString,
                    'response' => $response,
                    'user_id' => $user_id ?? 0
                ]);
                Log::channel('firebase')->info($response . '  ' . $dataString);
                // dd($response);
            }
        }
    }
}
