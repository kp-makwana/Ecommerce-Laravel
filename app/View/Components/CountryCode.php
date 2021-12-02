<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CountryCode extends Component
{
    /**
     * @var \App\Models\Country[]|\Illuminate\Database\Eloquent\Collection
     */
    public $country;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->country = \App\Models\Country::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.country-code');
    }
}
