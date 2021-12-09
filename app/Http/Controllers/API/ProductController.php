<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
//        // Default
//        $queryBuilder = Product::with('productImage', 'category', 'brand')->paginate(10);
//
//        return ProductResource::collection($queryBuilder);
        $queryBuilder = Product::query();

        $queryBuilder->with('productImage', 'category', 'brand');

        $request = $request->all();

        // Filter
        //category
        if (isset($request['category'])) {
            $queryBuilder->where('category_id', '=', $request['category']);
        }

        //brand sorting
        if (isset($request['brands'])) {
            $queryBuilder->where('brand_id', '=', $request['brands']);
        }

        //rating sorting
        if (isset($request['rating'])) {
            if ($request['rating'] == 'none') {
                $queryBuilder->where('avg_rating', '=', null);
            } else {
                $queryBuilder->where('avg_rating', '>=', $request['rating']);
            }
        }

        //Searching
        if (isset($request['search'])) {
            $query = $request['search'];

            if (ctype_digit($query)) {
                $queryBuilder->where('purchase_price', '=', $query)
                    ->orWhere('sale_price', '=', $query);
            } else {
                $queryBuilder->where('name', 'LIKE', '%' . $query . '%')
                    ->orWhereHas('category', function ($q) use ($query) {
                        $q->where('name', 'LIKE', '%' . $query . '%');
                    })
                    ->orWhereHas('brand', function ($q) use ($query) {
                        $q->where('name', 'LIKE', '%' . $query . '%');
                    });
            }
        }

        // Sorting
        if (isset($request['sorting'])) {
            if (in_array($request['sorting'], config('constants.orderBy'))) {
                if (isset($request['rating'])) {
                    $queryBuilder->orderBy('products.avg_rating', $request['sorting']);
                } else {
                    $queryBuilder->orderBy('products.id', $request['sorting']);
                }
            }

        } else {
            $queryBuilder->orderBy('products.id', 'desc');
        }

        // pagination
        if (!isset($request['no_of_record']) || !in_array($request['no_of_record'], config('constants.num_of_raw'))) {
            $request['no_of_record'] = 10;
        }

        $products = $queryBuilder->paginate($request['no_of_record']);
        $result['products'] = $products;
        $result['request'] = $request;
        return ProductResource::collection($products);
    }

    public function show($id)
    {

    }

    public function brand()
    {
        $brand = brand::orderBy('name')->select('id','name')->get();
        return response()->json($brand);
    }

    public function category()
    {
        $category =  Category::orderBy('name')->select('id','name')->get();
        return response()->json($category);
    }
}
