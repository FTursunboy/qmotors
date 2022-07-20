<?php

namespace App\View\Components\Dashboard;

use App\Models\CarModel;
use App\Models\User;
use Illuminate\View\Component;

class UserCarFilter extends Component
{
    public $models = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->models = CarModel::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.user-car-filter');
    }
}
