<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('admin.category.index',['categories' => $categories,'products'=>$products]);
    }

    public function add()
    {

    }
}
