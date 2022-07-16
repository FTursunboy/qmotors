<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginApiRequest;
use App\Http\Requests\Api\SendSmsCodeRequest;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    use ApiResponse;
    public function sendSmsCode(SendSmsCodeRequest $request)
    {
        $user = User::where('phone_number', $request->phone_number)->first();
        if ($user == null) {
            $id = User::nextID();
            $user = new User();
            $user->id = $id;
            $user->phone_number = $request->phone_number;
        }
        $user->sms_code = 1111; // TODO prod da random bo'ladi
        // TODO sms service ulash va generatsiya qilingan sms code ni yuborish kerak
        $user->save();
        return $this->success();
    }
    public function login(LoginApiRequest $request)
    {
        $user = User::where('phone_number', $request->phone_number)->first();
        if (is_null($user)) {
            return $this->error(['message' => __('auth.failed')], 422);
        }
        if ($user->sms_code != $request->sms_code) {
            return $this->error(['message' => __('auth.failed')], 422);
        }
        $token = $user->createToken('name')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return $this->success($response);
    }
}
