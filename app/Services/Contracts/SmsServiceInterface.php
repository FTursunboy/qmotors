<?php

namespace App\Services\Contracts;

interface SmsServiceInterface
{
  public function send($phone, $text);
}
