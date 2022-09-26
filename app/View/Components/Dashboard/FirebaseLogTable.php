<?php

namespace App\View\Components\Dashboard;

use App\Models\FirebaseLog;
use Illuminate\View\Component;

class FirebaseLogTable extends Component
{
    public $list = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->list = FirebaseLog::latest('id')->paginate(request()->get('per_page', 20));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.firebase-log-table');
    }
}
