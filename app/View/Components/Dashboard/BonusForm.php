<?php

namespace App\View\Components\Dashboard;

use App\Models\Bonus;
use App\Models\User;
use Illuminate\View\Component;

class BonusForm extends Component
{
    public $users = [];
    public $bonusTypes = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->users = User::latest()->get();
        $this->bonusTypes = Bonus::BONUS_TYPES;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.bonus-form');
    }
}
