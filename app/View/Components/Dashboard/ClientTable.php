<?php

namespace App\View\Components\Dashboard;

use App\Models\Client;
use Illuminate\View\Component;

class ClientTable extends Component
{
    public $list = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $order = requestOrder();
        $this->list = Client::where(function ($query) {
            $query
                ->where('id', 'like', '%' . request()->get('search', '') . '%')
                ->orWhere('phone', 'like', '%' . request()->get('search', '') . '%')
                ->orWhere('address', 'like', '%' . request()->get('search', '') . '%')
                ->orWhere('full_name', 'like', '%' . request()->get('search', '') . '%');
        })
            ->orderBy($order['key'], $order['value'])
            ->paginate(request()->get('per_page', 20));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.client-table');
    }
}
