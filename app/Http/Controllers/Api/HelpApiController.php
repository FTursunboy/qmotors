<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Help;
use App\Traits\ApiResponse;

class HelpApiController extends Controller
{
    use ApiResponse;
    public function index()
    {
        return $this->success(Help::findOrNew(1));
    }
}
