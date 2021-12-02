<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Category extends Component
{
    public $categories;
    public $selectedCategory;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($category = null)
    {
        $this->categories = \App\Models\Category::orderBy('name')->get();
        $this->selectedCategory = $category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category');
    }
}
