<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\PhotoOrderRequest;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Models\Order;
use App\Services\Contracts\OrderServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    use ApiResponse;

    public function show($id)
    {
        return $this->success(Order::with([
            'stock',
            'order_works',
            'order_spares'
        ])->findOrFail($id));
    }

    public function store(StoreOrderRequest $request, OrderServiceInterface $orderService)
    {
        return $this->success($orderService->store($request), 201);
    }

    public function photo($id, PhotoOrderRequest $request, OrderServiceInterface $orderService)
    {
        return $this->success($orderService->photo($id, $request));
    }

    public function history(Request $request, OrderServiceInterface $orderService)
    {
        return $this->success($orderService->history($request));
    }
}
