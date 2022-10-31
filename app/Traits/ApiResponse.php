<?php

namespace App\Traits;

trait ApiResponse
{
    public function success($result = 'Успешно', $code = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json(['result' => $result, 'errors' => null], $code);
    }

    public function error($result = 'Что-то пошло не так', $code = 400): \Illuminate\Http\JsonResponse
    {
        return response()->json(['result' => null, 'errors' => $result], $code);
    }

    public function notAccess($message = 'У вас нет доступа!', $code = 403): \Illuminate\Http\JsonResponse
    {
        return $this->error(['message' => $message], $code);
    }
}
