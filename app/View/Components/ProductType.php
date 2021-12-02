<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductType extends Component
{
    public $product_types;
    public $selectedType;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = null)
    {
        $this->product_types = \App\Models\ProductType::OrderBy('name')->get();
        $this->selectedType = $type;
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
