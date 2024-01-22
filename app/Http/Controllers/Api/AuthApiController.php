<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginApiRequest;
use App\Http\Requests\Api\SendSmsCodeRequest;
use App\Models\User;
use App\Services\Contracts\BonusServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    use ApiResponse;

    public function sendSmsCode(SendSmsCodeRequest $request, BonusServiceInterface $bonusService)
    {
        $user = User::where('phone_number', nudePhone($request->phone_number))->orWhere('phone_number', buildPhone($request->phone_number))->first();
        if ($user == null) {
            $user=  User::create([
                'phone_number' => buildPhone($request->phone_number),
                'gender' => 1
            ]);

            $bonusService->store(new Request([
                'user_id' => $user->id,
                'points' => 350,
                'bonus_type' => 'install',
                'title' => 'Установка Приложения',
                'status' => 1,
                'burn_date' => null
            ]));

        }
        if (in_array(buildPhone($request->phone_number), User::TEST_ACCOUNT_PHONE_NUMBERS)) {
            $user->sms_code = "000000";

        } else {
            $user->sms_code = "000000";
       //     $result = $smsService->send(filterPhone($user->phone_number), 'Ваш код для авторизация: ' . $user->sms_code);
        }

        $user->save();

        return $this->success();

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
