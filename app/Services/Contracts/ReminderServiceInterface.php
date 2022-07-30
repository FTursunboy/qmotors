<?php

namespace App\Services\Contracts;

interface ReminderServiceInterface
{
  public function store($reques);
  public function update($id, $reques);
}
