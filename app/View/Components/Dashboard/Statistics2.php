<?php

namespace App\View\Components\Dashboard;

use App\Models\FreeDiagnostic;
use App\Models\Order;
use App\Models\User;
use App\Models\UserCar;
use Illuminate\View\Component;

class Statistics2 extends Component
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
                'info' => 'Статистика пользователей',
                'counts' => [
                    'Последние 7 дней' => User::whereDate('created_at', '>=', date('Y-m-d', strtotime('-7 days')))->count(),
                    'Последние 30 дней' => User::whereDate('created_at', '>=', date('Y-m-d', strtotime('-30 days')))->count(),
                ]
            ],
            [
                'title' => 'Автомобили',
                'count' => User::count(),
                'info' => 'Статистика автомобиля',
                'counts' => [
                    'Последние 7 дней' => UserCar::whereDate('created_at', '>=', date('Y-m-d', strtotime('-7 days')))->count(),
                    'Последние 30 дней' => UserCar::whereDate('created_at', '>=', date('Y-m-d', strtotime('-30 days')))->count(),
                ]
            ],
            [
                'title' => 'Бесплатние диагностики',
                'count' => FreeDiagnostic::count(),
                'info' => 'Статистика бесплатной диагностики',
                'counts' => [
                    'Последние 7 дней' => UserCar::whereDate('created_at', '>=', date('Y-m-d', strtotime('-7 days')))->count(),
                    'Новый' => UserCar::whereDate('created_at', '>=', date('Y-m-d'))->count(),
                ]
            ],
            [
                'title' => 'Заказы',
                'count' => Order::whereDate('date',  date('Y-m-d'))->count(),
                'info' => 'Статистика заказов',
                'counts' => [
                    'Сегодния' => Order::whereDate('created_at', date('Y-m-d'))->count(),
                    'Завтра' => Order::whereDate('created_at', date('Y-m-d', strtotime('+1 day')))->count(),
                ]
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
        return view('components.dashboard.statistics2');
    }
}
