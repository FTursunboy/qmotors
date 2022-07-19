<?php

namespace App\View\Components\Dashboard;

use App\Models\Order;
use Illuminate\View\Component;

class SubscriptionOrdersTable extends Component
{
    public $orders;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->orders = Order::withTrashed()->where('type', 2)->latest('id')->paginate(10);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.subscription-orders-table');
    }
}
