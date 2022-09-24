<?php

namespace App\Services;

use App\Models\FirebaseLog;
use App\Models\Notification;
use App\Models\User;
use App\Services\Contracts\PushNotificationServiceInterface;
use Illuminate\Support\Facades\Log;

class PushNotificationService implements PushNotificationServiceInterface
{
  const FCM_URL = 'https://fcm.googleapis.com/fcm/send';
  const SERVER_KEY = 'AAAAg10Ahew:APA91bGySxHGYDiU6ZJEGliN5-b_tezhk33MajKDC58bkol3-qHbKAtWpzzf5BsRbCchNEA6lJ2XEveb3fa632Pbw5XwdjnczDB80Zg7K_UTV-Ii7Xdal15HaooP8xPEutUdh7YCSqTt';
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

  public static function send($request, $model, $user_id = null)
  {
    if ($request['send'] == 1) {
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
      $chunks =  array_chunk($registration_ids, 1000);
      foreach ($chunks as $tokens) {
        $data = [
          "registration_ids" => $tokens,
          "data" => $model,
          // "data" => [
          //   "title" => $request['title'],
          //   "text" => $request['text'],
          // ],
          "content_available" => true,
          "priority" => "high",
        ];

        $dataString = json_encode($data, JSON_UNESCAPED_SLASHES);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::FCM_URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, self::HEADERS);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);
        FirebaseLog::create([
          'fcmtokens' => json_encode($tokens),
          'data' => $dataString,
          'response' => $response
        ]);
        Log::channel('firebase')->info($response . '  ' . $dataString);
        // dd($response);
      }
    }
  }
}
