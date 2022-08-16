<?php

namespace App\View\Components\Dashboard;

use App\Services\NotificationService;
use Illuminate\View\Component;

class NotificationTable extends Component
{
    public $list = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $notificationService = new NotificationService();
        $this->list = $notificationService->filter();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.notification-table');
    }
}
