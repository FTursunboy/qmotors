<?php

namespace App\View\Components\Dashboard;

use App\Models\Product;
use Illuminate\View\Component;

class OrderForm extends Component
{
    public $products = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->products = Product::latest('id')->get();
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
