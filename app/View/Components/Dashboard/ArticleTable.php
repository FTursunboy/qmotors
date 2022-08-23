<?php

namespace App\View\Components\Dashboard;

use App\Services\ArticleService;
use Illuminate\View\Component;

class ArticleTable extends Component
{
    public $list = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $articleService = new ArticleService();
        $this->list = $articleService->filter();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.article-table');
    }
}
