<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Brand extends Component
{
    public $brands;
    public $selectedBrand;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($brand = null)
    {
        $this->brands = \App\Models\Brand::orderBy('name')->get();
        $this->selectedBrand = $brand;
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
