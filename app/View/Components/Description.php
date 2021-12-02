<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class Description extends Component
{
    public $product;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
         $this->product = Product::find($id);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.description');
    }
}
