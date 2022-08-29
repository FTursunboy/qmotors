<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\User;
use App\Services\Contracts\NotificationServiceInterface;
use Illuminate\Support\Facades\Http;

class NotificationService implements NotificationServiceInterface
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

  public function filter()
  {
    $order = requestOrder();
    return $this->class::where(function ($query) {
      if ($this->request->user != null) {
        $query->whereHas('user', function ($query) {
          $query->where('surname', 'ilike', '%' . $this->request->user . '%')
            ->orWhere('name', 'ilike', '%' . $this->request->user . '%')
            ->orWhere('id', 'ilike', '%' . $this->request->user . '%');
        });
      }
      if ($this->request->title != null) {
        $query->where('title', 'ilike', '%' . $this->request->title . '%');
      }
      if ($this->request->text != null) {
        $query->where('text', 'ilike', '%' . $this->request->text . '%');
      }
      if ($this->request->notification_type != null) {
        $query->where('notification_type', 'ilike', '%' . $this->request->notification_type . '%');
      }
      if ($this->request->additional_id != null) {
        $query->where('additional_id', 'ilike', '%' . $this->request->additional_id . '%');
      }
      if ($this->request->created_at_start != null) {
        $query->whereDate('created_at', '>=', $this->request->created_at_start);
      }
      if ($this->request->created_at_end != null) {
        $query->whereDate('created_at', '<=', $this->request->created_at_end);
      }
      if ($this->request->updated_at_start != null) {
        $query->whereDate('updated_at', '>=', $this->request->updated_at_start);
      }
      if ($this->request->updated_at_end != null) {
        $query->whereDate('updated_at', '<=', $this->request->updated_at_end);
      }
    })
      ->orderBy($order['key'], $order['value'])
      ->paginate($this->request->get('per_page', 20));
  }

  public function store($request)
  {
    $model = $this->class::create(array_merge(
      $request->only('user_id', 'title', 'text', 'notification_type', 'additional_id'),
      [
        'id' => $this->class::nextID()
      ]
    ));
    $this->send($request);
    return $model;
  }

  public function update($id, $request)
  {
    $model = $this->class::findOrFail($id);
    $model->update($request->only('user_id', 'title', 'text', 'notification_type', 'additional_id'));
    $this->send($request);
    return $model;
  }

  public function setDeviceToken($request)
  {
    auth()->user()->update(['device_token' => $request->token]);
    return 'Токен успешно сохранен.';
  }

  public function send($request)
  {
    if ($request->send) {
      $user = User::find($request->user_id);
      $data = [
        "registration_ids" => [$user->device_token],
        "data" => [
          "title" => $request->title,
          "text" => $request->text,
        ],
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
      // dd($response);
    }
  }
}
