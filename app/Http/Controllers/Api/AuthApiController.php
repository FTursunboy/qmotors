<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginApiRequest;
use App\Http\Requests\Api\SendSmsCodeRequest;
use App\Models\User;
use App\Services\Contracts\SmsServiceInterface;
use App\Traits\ApiResponse;

class AuthApiController extends Controller
{
    use ApiResponse;

    public function sendSmsCode(SendSmsCodeRequest $request, SmsServiceInterface $smsService)
    {
        $result = false;
        $user = User::where('phone_number', nudePhone($request->phone_number))->orWhere('phone_number', buildPhone($request->phone_number))->first();
        if ($user == null) {
            $id = User::nextID();
            $user = new User();
            $user->id = $id;
            $user->gender = 1;
            $user->phone_number = buildPhone($request->phone_number);
        }
        if (in_array(buildPhone($request->phone_number), User::TEST_ACCOUNT_PHONE_NUMBERS)) {
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
        $user = User::where('phone_number', nudePhone($request->phone_number))->orWhere('phone_number', buildPhone($request->phone_number))->first();
        if (is_null($user)) {
            return $this->error(['message' => __('auth.failed')], 422);
        }
        if ($user->sms_code != $request->sms_code) {
            return $this->error(['message' => __('auth.failed')], 422);
        }
        if (in_array($request->phone_number, User::TEST_ACCOUNT_PHONE_NUMBERS)) {
            $user->sms_code = 111111;
        } else {
            $user->sms_code = null;
        }
        $user->phone_number = buildPhone($user->phone_number);
        $user->save();
        $token = $user->createToken('name')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return $this->success($response);
    }
}
