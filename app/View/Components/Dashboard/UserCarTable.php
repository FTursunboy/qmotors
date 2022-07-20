<?php

namespace App\View\Components\Dashboard;

use App\Models\UserCar;
use App\Services\UserCarService;
use Illuminate\View\Component;

class UserCarTable extends Component
{
    public $list = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $service = new UserCarService();
        $this->list = $service->filter();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.user-car-table');
    }
}
