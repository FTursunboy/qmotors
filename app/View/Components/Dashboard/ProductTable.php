<?php

namespace App\View\Components\Dashboard;

use App\Models\Product;
use Illuminate\View\Component;

class ProductTable extends Component
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
        $this->list = Product::where(function ($query) {
            $query
                ->where('id', 'like', '%' . request()->get('search', '') . '%')
                ->orWhere('price', 'like', '%' . request()->get('search', '') . '%')
                ->orWhereHas('translations', function ($query) {
                    $query->where('name', 'like', '%' . request()->get('search', '') . '%')
                        ->orWhere('description', 'like', '%' . request()->get('search', '') . '%');
                });
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
        return view('components.dashboard.product-table');
    }
}
