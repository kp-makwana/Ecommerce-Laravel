<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Default
        $queryBuilder = Product::with('productImage', 'category', 'brand')->paginate(10);

        return ProductResource::collection($queryBuilder);

    }

    public function show($id)
    {

    }
}
