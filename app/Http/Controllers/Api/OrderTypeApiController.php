<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListResource;
use App\Models\OrderType;
use App\Traits\ApiResponse;

class OrderTypeApiController extends Controller
{
    use ApiResponse;

    public function list()
    {
        return $this->success(ListResource::collection(OrderType::orderBy('id')->get()));
    }

    public function show($id)
    {
        return $this->success(OrderType::findOrFail($id));
    }
}
