<?php

namespace App\View\Components\Dashboard;

use App\Models\FreeDiagnostic;
use App\Services\FreeDiagnosticService;
use Illuminate\View\Component;

class FreeDiagnosticTable extends Component
{
    public $list = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $service = new FreeDiagnosticService();
        $this->list = $service->filter();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.free-diagnostic-table');
    }
}
