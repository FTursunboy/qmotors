<?php

namespace App\View\Components\Dashboard;

use App\Models\FreeDiagnostic;
use App\Models\Order;
use App\Models\User;
use App\Models\UserCar;
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
                'title' => 'Пользователи',
                'count' => User::count(),
                'icon' => 'users',
                'url' => '#',
                'color' => 'blue'
            ],
            [
                'title' => 'Пользователи (последние 7 дней)',
                'count' => User::whereDate('created_at', '>=', date('Y-m-d', strtotime('-7 days')))->count(),
                'icon' => 'users',
                'url' => '#',
                'color' => 'success'
            ],
            [
                'title' => 'Автомобили',
                'count' => UserCar::count(),
                'icon' => 'car',
                'url' => '/user-car',
                'color' => 'orange'
            ],
            [
                'title' => 'Автомобили (последние 7 дней)',
                'count' => UserCar::whereDate('created_at', '>=', date('Y-m-d', strtotime('-7 days')))->count(),
                'icon' => 'car',
                'url' => '/user-car?created_at_start=' . date('Y-m-d'),
                'color' => 'red'
            ],
            [
                'title' => 'Бесплатние диагностики',
                'count' => FreeDiagnostic::whereDate('date', '>', date('Y-m-d'))->count(),
                'icon' => 'cog',
                'url' => '#',
                'color' => 'green'
            ],
            [
                'title' => 'Заказы (сегодня)',
                'count' => Order::whereDate('date',  date('Y-m-d'))->count(),
                'icon' => 'shopping-cart',
                'url' => '#',
                'color' => 'dark'
            ],
            [
                'title' => 'Заказы (завтра)',
                'count' => Order::whereDate('date',  date('Y-m-d', strtotime('+1 day')))->count(),
                'icon' => 'shopping-cart',
                'url' => '#',
                'color' => 'secondary'
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
