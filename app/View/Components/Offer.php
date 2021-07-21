<?php

namespace App\View\Components;

use App\Models\Offer as offers;
use Illuminate\View\Component;

class Offer extends Component
{
    public $offer;
    public $id;
    public $product_id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id,$product)
    {
        $this->offer = offers::find($id);
        $this->id = $id;
        $this->product_id = $product;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.offer');
    }
}
