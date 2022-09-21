<?php

namespace App\View\Components\Dashboard;

use App\Models\UserCar;
use Illuminate\View\Component;

class ReminderForm extends Component
{
    public $user_cars = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user_cars = UserCar::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.reminder-form');
    }
}
