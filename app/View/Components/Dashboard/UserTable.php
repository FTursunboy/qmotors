<?php

namespace App\View\Components\Dashboard;

use App\Services\UserService;
use Illuminate\View\Component;

class UserTable extends Component
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
        $this->list = $service->filter();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.user-table');
    }
}
