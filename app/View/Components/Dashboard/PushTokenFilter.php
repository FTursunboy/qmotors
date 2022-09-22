<?php

namespace App\View\Components\Dashboard;

use App\Models\User;
use Illuminate\View\Component;

class PushTokenFilter extends Component
{
    public $genders = User::GENDERS;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.push-token-filter');
    }
}
