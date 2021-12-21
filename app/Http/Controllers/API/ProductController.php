<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController as Product_Controller;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use App\Traits\Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use Response;

    public function index(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $queryBuilder = Product::query();

        $queryBuilder->with('productImage', 'category', 'brand');

        $request = $request->all();

        // Filter
        //category
        if (isset($request['category'])) {
            $queryBuilder->where('category_id', $request['category']);
        }

        //brand sorting
        if (isset($request['brands'])) {
            $queryBuilder->where('brand_id', $request['brands']);
        }

        //rating sorting
        if (isset($request['rating'])) {
            if ($request['rating'] == 'none') {
                $queryBuilder->where('avg_rating', null);
            } else {
                $queryBuilder->where('avg_rating', '>=', $request['rating']);
            }
        }

        //Searching
        if (isset($request['search'])) {
            $search = $request['search'];
            if (ctype_digit($search)) {
                $queryBuilder->where('sale_price', $search);
            } else {
                $queryBuilder->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhereHas('category', function ($q) use ($search) {
                            $q->where('name', 'LIKE', '%' . $search . '%');
                        })
                        ->orWhereHas('brand', function ($q) use ($search) {
                            $q->where('name', 'LIKE', '%' . $search . '%');
                        });
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

    public function details(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $product = Product::with('productImage')->where('id', $id)->first();
        if ($product) {
            return $this->success([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->sale_price,
                'brand_name' => $product->brand->name,
                'category_name' => $product->category->name,
                'product_type' => $product->productType,
                'number_of_rating' => ($product->number_of_rating == NULL) ? 0 : $product->number_of_rating,
                'avg_rating' => ($product->averageRatings() == NULL) ? 'N/A' : $product->averageRatings(),
                'description' => $product->description,
                'images' => collect($product->productImage)->map(function ($q) {
                    return asset('storage/ProductImages/' . $q->name);
                })
            ]);
        } else {
            return $this->error('Product Not Found');
        }
    }

    public function brand(): \Illuminate\Http\JsonResponse
    {
        $brand = brand::orderBy('name')->select('id', 'name')->get();
        return response()->json($brand);
    }

    public function category(): \Illuminate\Http\JsonResponse
    {
        $category = Category::orderBy('name')->select('id', 'name')->get();
        return response()->json($category);
    }

    public function offers($id)
    {
        $count = Offer::where('product_id', $id)->orWhere('status', 'active')->count();
        if ($count > 0) {
            $queryBuilder = Offer::where('product_id', $id)->orWhere('status', 'active')->get();
            $data = $queryBuilder->map(function ($q) {
                return [
                    'id' => $q->id,
                    'offer_name' => $q->offer_name,
                    'offer_price' => $q->offer_price,
                    'offer_percentage' => $q->percentage . '%',
                    'flat_offer' => $q->flat_discount,
                    'description' => $q->description,
                    'offer_date' => Carbon::parse($q->start_date)->format('jS F Y h:m') . ' hrs to ' . Carbon::parse($q->end_date)->format('jS F Y h:m') . ' hrs',
                ];
            });
            return $this->success($data);
        }
        return $this->error("Not available any offer in this product.");
    }

    public function addToCart($id): \Illuminate\Http\JsonResponse
    {
        $result = Product_Controller::addToCarts($id);
        if ($result) {
            return $this->success(['result' => 'Item added in your cart.']);
        } else {
            return $this->error('Item already in your cart.');
        }
    }

    public function checkInCart($id): \Illuminate\Http\JsonResponse
    {
        if (Cart::where('user_id', Auth::user()->id)->where('product_id', $id)->first()) {
            return response()->json(['result' => true]);
        }
        return response()->json(['result' => false]);
    }
}
