<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListResource;
use App\Models\TechCenter;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class TechCenterApiController extends Controller
{
    use ApiResponse;

    public function list()
    {
        return $this->success(ListResource::collection(TechCenter::all()));
    }

    public function show($id)
    {
        return $this->success(TechCenter::findOrFail($id));
    }
}
