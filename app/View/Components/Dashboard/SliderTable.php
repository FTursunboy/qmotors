<?php

namespace App\View\Components\Dashboard;

use App\Models\Slider;
use Illuminate\View\Component;

class SliderTable extends Component
{
    public $list = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->list = Slider::whereHas('translations', function ($query) {
            $query->where('title', 'like', '%' . request()->get('search', '') . '%')
                ->orWhere('text', 'like', '%' . request()->get('search', '') . '%');
        })->latest('id')->paginate(request()->get('per_page', 20));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.slider-table');
    }
}
