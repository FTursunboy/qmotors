<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class Statistics extends Component
{
    public $statistics = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->statistics = [
            [
                'title' => 'Customers',
                'count' => 0,
                'icon' => 'users',
                'url' => '/dashboard/clients',
                'color' => 'blue'
            ],
            [
                'title' => 'Products',
                'count' => 0,
                'icon' => 'coffee',
                'url' => 'dashboard/products',
                'color' => 'info'
            ],
            [
                'title' => 'One Time Orders (last 30 days)',
                'count' => 0,
                'icon' => 'shopping-basket',
                'url' => 'dashboard/orders/one-time',
                'color' => 'orange'
            ],
            [
                'title' => 'Subscription Orders (active)',
                'count' => 0,
                'icon' => 'shopping-cart',
                'url' => 'dashboard/orders/subscription',
                'color' => 'red'
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.statistics');
    }
}
