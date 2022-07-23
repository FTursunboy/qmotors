<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
}
