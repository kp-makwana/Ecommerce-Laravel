<?php

namespace App\View\Components;

use Illuminate\View\Component;

class summary extends Component
{
    public $summary;

    public function __construct($summary)
    {
        $this->summary = $summary;
    }

    public function render()
    {
        return view('components.summary');
    }
}
