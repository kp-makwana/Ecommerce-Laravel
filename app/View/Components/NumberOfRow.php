<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NumberOfRow extends Component
{
    public $no_of_row;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($record = 10)
    {
        $this->no_of_row = $record;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.number-of-row');
    }
}
