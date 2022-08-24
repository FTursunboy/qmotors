<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class NotificationApiController extends Controller
{
    use ApiResponse;
    public function index()
    {
        return $this->success(Notification::where('user_id', auth()->id())->exclude('text')->latest()->get());
    }

    public function show($id)
    {
        return $this->success(Notification::find($id));
    }
}
