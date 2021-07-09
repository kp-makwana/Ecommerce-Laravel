<?php

namespace App\View\Components;

use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

class ProductRating extends Component
{
    public $ratings;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->ratings = \App\Models\ProductRating::RATING;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-rating');
    }
}
