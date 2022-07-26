<?php

namespace App\View\Components\Dashboard;

use App\Services\Contracts\TechCenterServiceInterface;
use App\Services\TechCenterService;
use App\Services\TechService;
use Illuminate\View\Component;

class TechCenterTable extends Component
{
    public $list = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $techCenterService = new TechCenterService();
        $this->list = $techCenterService->filter();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.tech-center-table');
    }
}
