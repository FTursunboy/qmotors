<?php

namespace App\Services\Contracts;

interface NotificationServiceInterface
{
  public function store($request);
  public function update($id, $request);
}
