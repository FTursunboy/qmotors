<?php

namespace App\View\Components\Dashboard;

use App\Models\Order;
use App\Services\OrderService;
use Illuminate\View\Component;

class OrderTable extends Component
{
    public $list = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $service = new OrderService();
        $this->list = $service->filter();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.order-table');
    }
}
