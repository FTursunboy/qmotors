<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Services\Contracts\OrderServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    use ApiResponse;
    public function store(StoreOrderRequest $request, OrderServiceInterface $orderService)
    {
        return $orderService->store($request);
    }
}
