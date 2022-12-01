<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ChatRequest;
use App\Http\Resources\ChatMessageResource;
use App\Models\Chat;
use App\Services\Contracts\ChatServiceInterface;
use App\Traits\ApiResponse;

class ChatApiController extends Controller
{
    use ApiResponse;

    public function index()
    {
        return $this->success(Chat::firstOrCreate(['user_id' => auth()->id()]));
    }

    public function message(ChatRequest $request, ChatServiceInterface $service)
    {
        return $this->success($service->message($request), 201);
    }

    public function messages(ChatServiceInterface $service)
    {
        return $this->success(ChatMessageResource::collection($service->messages()));
    }
}
