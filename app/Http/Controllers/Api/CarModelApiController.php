<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListResource;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelApiController extends Controller
{
    public function list()
    {
        return ListResource::collection(CarModel::all());
    }
}
