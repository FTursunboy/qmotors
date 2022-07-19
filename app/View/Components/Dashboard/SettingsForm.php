<?php

namespace App\View\Components\Dashboard;

use App\Models\Contact;
use Illuminate\View\Component;

class SettingsForm extends Component
{
    public $setting;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->setting = Contact::find(1);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.settings-form');
    }
}
