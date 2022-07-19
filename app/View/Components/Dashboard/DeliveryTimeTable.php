<?php

namespace App\View\Components\Dashboard;

use App\Models\DeliveryTime;
use Illuminate\View\Component;

class DeliveryTimeTable extends Component
{
    public $list;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->list = DeliveryTime::latest('id')->paginate(20);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.delivery-time-table');
    }
}
