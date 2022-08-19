<?php

namespace App\View\Components\Dashboard;

use App\Services\ReviewService;
use Illuminate\View\Component;

class ReviewTable extends Component
{
    public $list = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $reminderService = new ReviewService();
        $this->list = $reminderService->filter();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.review-table');
    }
}
