<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Services\Contracts\OneCServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    use ApiResponse;

    public function profile()
    {
        return $this->success(auth()->user());
    }

    public function autos()
    {
        return $this->success(auth()->user()->user_cars);
    }

    public function update(UpdateProfileRequest $request, UserServiceInterface $userService)
    {
        $result = $userService->updateApi($request);
        // return $this->success(auth()->user());
        return $this->success($result);
    }

    public function delete(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        auth()->user()->delete();
    }

    public function oneC(OneCServiceInterface $service)
    {
        return $this->success($service->receive());
    }
}
