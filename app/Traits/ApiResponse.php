<?php

namespace App\Traits;

trait ApiResponse
{
  public function success($result = 'Успешно', $code = 200)
  {
    return response()->json(['result' => $result, 'error' => null], $code);
  }

  public function error($result = 'Что-то пошло не так', $code = 400)
  {
    return response()->json(['result' => null, 'error' => $result], $code);
  }
}
