<?php

namespace App\View\Components\Dashboard;

use App\Services\ReminderService;
use Illuminate\View\Component;

class ReminderTable extends Component
{
    public $list = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $reminderService = new ReminderService();
        $this->list = $reminderService->filter();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.reminder-table');
    }
}
