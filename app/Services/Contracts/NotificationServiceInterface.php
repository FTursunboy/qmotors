<?php

namespace App\Services\Contracts;

interface NotificationServiceInterface
{
  public function store($request);
  public function update($id, $request);
  public function setDeviceToken($request);
  public function send($request);
}
