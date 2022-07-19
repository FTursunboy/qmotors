<?php

namespace App\View\Components\Dashboard;

use App\Models\UserCar;
use Illuminate\View\Component;

class UserCarTable extends Component
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
        $this->list = UserCar::where(function ($query) {
            if (request()->model_id != null) {
                $query->where('car_model_id', request()->model_id);
            }
            if (request()->user_id != null) {
                $query->where('user_id', request()->user_id);
            }
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
        return view('components.dashboard.user-car-table');
    }
}
