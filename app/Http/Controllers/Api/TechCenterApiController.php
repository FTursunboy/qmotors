<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TechCenter\TechCentersResource;
use App\Models\Reminder;
use App\Models\TechCenter;
use App\Traits\ApiResponse;

class TechCenterApiController extends Controller
{
    use ApiResponse;

    public function list()
    {
        return $this->success(TechCentersResource::collection(TechCenter::all()));
    }

    public function show($id)
    {
        return $this->success(TechCenter::findOrFail($id));
    }
}
