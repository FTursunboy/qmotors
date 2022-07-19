<?php

namespace App\View\Components\Dashboard;

use App\Models\Order;
use App\Models\SubscriptionPay;
use Illuminate\View\Component;

class SubscriptionPaysTable extends Component
{
    public $list;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->list = SubscriptionPay::where('order_id', request('id'))->latest('id')->paginate(20);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.subscription-pays-table');
    }
}
