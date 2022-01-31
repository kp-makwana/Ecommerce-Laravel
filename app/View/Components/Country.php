<?php

namespace App\View\Components;

use Illuminate\View\Component;


class Country extends Component
{
    public $countries;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $class;

    public function __construct($class = '')
    {
        $this->countries = \App\Models\Country::all();
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.country');
    }
}
