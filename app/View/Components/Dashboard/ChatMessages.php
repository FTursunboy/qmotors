<?php

namespace App\View\Components\Dashboard;

use App\Models\Chat;
use App\Models\User;
use App\Services\ChatService;
use Illuminate\View\Component;

class ChatMessages extends Component
{
    public $messages = [];
    public $user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $user_id = request()->route()->parameter('user_id');
        $service = new ChatService;
        $chat = Chat::firstOrCreate(['user_id' => $user_id]);
        $this->messages = $service->messages($chat->id);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.chat-messages');
    }
}
