<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Contracts\ChatServiceInterface;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index($user_id)
    {
        $user = User::find($user_id);
        return view('dashboard.pages.chat.index', compact('user'));
    }

    public function message($user_id, Request $request, ChatServiceInterface $service)
    {
        $service->message($request, $user_id, true);
        return back();
    }
}
