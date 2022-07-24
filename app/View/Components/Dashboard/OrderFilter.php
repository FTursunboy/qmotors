<?php

namespace App\View\Components\dashboard;

use App\Models\Order;
use Illuminate\View\Component;

class OrderFilter extends Component
{
    public $all = 0;
    public $guarantee = 0;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $query = Order::query();
        $this->all = $query->count();
        $this->guarantee = $query->where('guarantee', true)->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.order-filter');
    }
}
