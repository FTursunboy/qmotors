<?php

namespace App\View\Components\Dashboard;

use App\Models\User;
use Illuminate\View\Component;

class NotificationForm extends Component
{
    public $users = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->users = User::latest()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.notification-form');
    }
}
