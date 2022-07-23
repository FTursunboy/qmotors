<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListResource;
use App\Models\CarMark;
use Illuminate\Http\Request;

class CarMarkApiController extends Controller
{
    public function list()
    {
        return ListResource::collection(CarMark::all());
    }
}
