<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductType extends Component
{
    public $product_types;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->product_types = \App\Models\ProductType::OrderBy('name')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-type');
    }
}
