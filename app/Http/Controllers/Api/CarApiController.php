<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Car\DeletePhotoCarRequest;
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
        $result = UserCar::with(['user_car_photos', 'model.mark'])->where('user_id', auth()->id())->get();
        return $this->success($result);
    }

    public function show($id)
    {
        return $this->success(UserCar::with(['user_car_photos', 'model.mark'])->findOrFail($id));
    }

    public function store(StoreCarRequest $request, CarServiceInterface $carService)
    {
        return $this->success($carService->store($request), 201);
    }

    public function update($id, UpdateCarRequest $request, CarServiceInterface $carService)
    {
        return $this->success($carService->update($id, $request));
    }

    public function photo($id, PhotoCarRequest $request, CarServiceInterface $carService)
    {
        return $this->success($carService->photo($id, $request));
    }

    public function photoDelete($id, DeletePhotoCarRequest $request, CarServiceInterface $carService)
    {
        return $this->success($carService->photoDelete($id));
    }
}
