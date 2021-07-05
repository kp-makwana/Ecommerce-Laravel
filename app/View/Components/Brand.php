<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Brand extends Component
{
    public $brands;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->brands = \App\Models\Brand::orderBy('name')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.brand');
    }
}
