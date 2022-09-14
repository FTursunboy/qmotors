<?php

namespace App\Services\Contracts;

interface PushNotificationServiceInterface
{
  public function setDeviceToken($request);
  public static function send($request, $model);
}
