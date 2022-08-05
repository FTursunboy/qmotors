<?php

namespace App\View\Components\Dashboard;

use App\Services\BonusService;
use Illuminate\View\Component;

class BonusTable extends Component
{
    public $list = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $bonusService = new BonusService();
        $this->list = $bonusService->filter();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.bonus-table');
    }
}
