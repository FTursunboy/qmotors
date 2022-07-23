<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListResource;
use App\Models\CarModel;
use App\Services\Contracts\CarServiceInterface;
use Illuminate\Http\Request;

class CarModelApiController extends Controller
{
    public function list(Request $request, CarServiceInterface $carService)
    {
        return ListResource::collection($carService->modelList($request));
    }
}
