<?php

namespace App\Traits;

trait ApiResponse
{
  public function success($result, $code = 200)
  {
    return response()->json(['result' => $result, 'error' => null], $code);
  }

  public function error($result, $code = 400)
  {
    return response()->json(['result' => null, 'error' => $result], $code);
  }
}
