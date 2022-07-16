<?php

namespace App\Traits;

trait ModelCommonMethods
{
  public static function nextID()
  {
    return self::latest('id')->select('id')->first()->id + 1;
  }
}
