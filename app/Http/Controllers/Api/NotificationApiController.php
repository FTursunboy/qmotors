<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Services\Contracts\NotificationServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class NotificationApiController extends Controller
{
    use ApiResponse;
    public function index()
    {
        return $this->success(Notification::where('user_id', auth()->id())->latest()->get());
    }

    public function show($id)
    {
        return $this->success(Notification::find($id));
    }

    public function device(Request $request, NotificationServiceInterface $service)
    {
        return $this->success($service->setDeviceToken($request));
    }
}
