<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginApiRequest;
use App\Http\Requests\Api\SendSmsCodeRequest;
use App\Models\User;
use App\Services\Contracts\OneCServiceInterface;
use App\Services\Contracts\SmsServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    use ApiResponse;
    public function sendSmsCode(SendSmsCodeRequest $request, SmsServiceInterface $smsService)
    {
        $user = User::where('phone_number', $request->phone_number)->first();
        if ($user == null) {
            $id = User::nextID();
            $user = new User();
            $user->id = $id;
            $user->phone_number = $request->phone_number;
        }
        if ($request->phone_number == User::TEST_ACCOUNT_PHONE_NUMBER) {
            $user->sms_code = 111111;
            $result = true;
        } else {
            $user->sms_code = rand(100000, 999999);
            $result = $smsService->send(filterPhone($user->phone_number), 'Ваш код для авторизация: ' . $user->sms_code);
        }
        $user->save();

        if ($result)
            return $this->success();
        return $this->error();
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
        if ($request->phone_number == User::TEST_ACCOUNT_PHONE_NUMBER) {
            $user->sms_code = 111111;
        } else {
            $user->sms_code = null;
        }
        $user->save();
        $token = $user->createToken('name')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return $this->success($response);
    }
}
