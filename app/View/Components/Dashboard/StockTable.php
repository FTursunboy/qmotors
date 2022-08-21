<?php

namespace App\View\Components\Dashboard;

use App\Services\StockService;
use Illuminate\View\Component;

class StockTable extends Component
{
    public $list = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $stockService = new StockService();
        $this->list = $stockService->filter();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.stock-table');
    }
}
