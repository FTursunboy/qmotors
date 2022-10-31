<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListResource;
use App\Models\CarMark;
use App\Traits\ApiResponse;

class CarMarkApiController extends Controller
{
    use ApiResponse;

    public function list()
    {
        return $this->success(ListResource::collection(CarMark::all()));
    }

    public function show($id)
    {
        return $this->success(CarMark::findOrFail($id));
    }
}
