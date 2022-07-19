<?php

namespace App\View\Components\Dashboard;

use App\Models\Client;
use Illuminate\View\Component;

class ClientForm extends Component
{
    public $client;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = Client::find(request('id'));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.client-form');
    }
}
