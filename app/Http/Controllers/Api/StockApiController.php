<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Traits\ApiResponse;

class StockApiController extends Controller
{
    use ApiResponse;

    public function index()
    {
        return $this->success(Stock::exclude('text')->latest()->get());
    }

    public function show($id)
    {
        return $this->success(Stock::find($id)->append('body'));
    }
}
