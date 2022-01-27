<?php

namespace App\View\Components;

use App\Models\Cart;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class summary extends Component
{

    public function __construct()
    {

    }

    public function render()
    {
        return view('components.summary');
    }
}
