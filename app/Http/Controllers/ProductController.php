<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductRating;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use Response;

    public function index(Request $request, $queryBuilder = null): array
    {
        if ($queryBuilder == null) {
            $queryBuilder = Product::query();
        }
        $queryBuilder->with('productImage', 'category', 'brand');
        $queryBuilder->sortable();

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
        return $result;
    }

    public function show(Request $request, $id)
    {
        $product = Product::with('offers')->where('id', $id)->first();
        $ratings = ProductRating::where('product_id', $id)->paginate(10);
        return view('user.Product.showProduct', ['product' => $product, 'ratings' => $ratings]);

    }

    public function addToCarts($id): bool
    {
        $product = Product::find($id);
        $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
        if (!$cart) {
            $item = new cart;
            $item->user_id = Auth::user()->id;
            $item->product_id = $product->id;
            $item->quantity = 1;
            $item->price = $product->sale_price;
            $item->save();
            return true;
        }
        return false;
    }

    public function cartList()
    {
        return Cart::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
    }

    public function cartQuantityAdd($id): \Illuminate\Http\JsonResponse
    {
        $cart = Cart::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
        if ($cart) {
            if ($cart->quantity < 5) {
                $cart->quantity++;
                $cart->save();
                session()->flash('success', 'Change  Quantity in ' . $cart->quantity);
                return response()->json(['quantity' => $cart->quantity, 'message' => 'Change Quantity in ' . $cart->quantity]);
            }
            return response()->json('Were sorry! Only 5 unit(s) allowed in each order');
        }
        return response()->json('Product Not Found in Cart.');
    }

    public function cartQuantityRemove($id): \Illuminate\Http\JsonResponse
    {
        $cart = Cart::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
        if ($cart->quantity > 1) {
            $cart->quantity--;
            $cart->save();
            session()->flash('success', 'Change  Quantity in ' . $cart->quantity);
            return response()->json(['quantity' => $cart->quantity, 'Change Quantity in ' . $cart->quantity]);
        }
        return response()->json('Only 1 Quantity less.');
    }
}
