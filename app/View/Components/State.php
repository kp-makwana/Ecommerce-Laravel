<?php

namespace App\View\Components;

use App\Models\State as States;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class State extends Component
{
    public $getStates;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->getStates = States::where('country_id', Auth::user()->address->country_id)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.state');
    }
}
