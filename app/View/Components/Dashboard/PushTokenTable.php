<?php

namespace App\View\Components\Dashboard;

use App\Models\User;
use App\Services\UserService;
use Illuminate\View\Component;

class PushTokenTable extends Component
{
    public $list = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $service = new UserService();
        $this->list = $service->filter(true);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.push-token-table');
    }
}
