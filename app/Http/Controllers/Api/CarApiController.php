<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Car\PhotoCarRequest;
use App\Http\Requests\Car\StoreCarRequest;
use App\Http\Requests\Car\UpdateCarRequest;
use App\Models\UserCar;
use App\Services\Contracts\CarServiceInterface;
use App\Traits\ApiResponse;

class CarApiController extends Controller
{
    use ApiResponse;

    public function index()
    {
        return $this->success(auth()->user()->user_cars);
    }

    public function show($id)
    {
        return $this->success(UserCar::with('user_car_photos')->findOrFail($id));
    }

    public function store(StoreCarRequest $request, CarServiceInterface $carService)
    {
        return $this->success($carService->store($request), 201);
    }

    public function update($id, UpdateCarRequest $request, CarServiceInterface $carService)
    {
        return $this->success($carService->update($id, $request));
    }


    public function photo($id, PhotoCarRequest $request, CarServiceInterface $orderService)
    {
        return $this->success($orderService->photo($id, $request));
    }
}
