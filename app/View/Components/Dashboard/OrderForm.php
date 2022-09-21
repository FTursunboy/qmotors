<?php

namespace App\View\Components\Dashboard;

use App\Models\OrderType;
use App\Models\Product;
use App\Models\Stock;
use App\Models\TechCenter;
use App\Models\UserCar;
use Illuminate\View\Component;

class OrderForm extends Component
{
    public $user_cars = [];
    public $techCenters = [];
    public $orderTypes = [];
    public $stocks = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user_cars = UserCar::latest('id')->get();
        $this->techCenters = TechCenter::latest('id')->get();
        $this->orderTypes = OrderType::latest('id')->get();
        $this->stocks = Stock::latest('id')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.order-form');
    }
}
