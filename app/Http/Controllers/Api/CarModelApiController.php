<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListResource;
use App\Models\CarModel;
use App\Services\Contracts\CarServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CarModelApiController extends Controller
{
    use ApiResponse;

    public function list(Request $request, CarServiceInterface $carService)
    {
        return $this->success(ListResource::collection($carService->modelList($request)));
    }

    public function show($id)
    {
        return $this->success(CarModel::findOrFail($id));
    }
}
