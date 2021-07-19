<?php

namespace App\View\Components;

use App\Models\Offer;
use Illuminate\View\Component;

class OfferView extends Component
{
    public $offer;
    public $action;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id,$action)
    {
//        dd($id);
        $this->action = $action;
        $this->offer = Offer::find($id);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.offer-view');
    }
}
