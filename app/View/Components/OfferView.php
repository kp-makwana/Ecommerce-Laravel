<?php

namespace App\View\Components;

use App\Models\Offer;
use Illuminate\View\Component;

class OfferView extends Component
{
    public $offer;
    public $action;
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id,$action = "Edit")
    {
        $this->action = $action;
        $this->offer = Offer::find($id);
        $this->id = $id;
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
