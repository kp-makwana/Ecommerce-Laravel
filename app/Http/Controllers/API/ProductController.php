<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController as Product_Controller;
use App\Http\Resources\CartResource;
use App\Http\Resources\ProductRatingResource;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use App\Models\ProductRating;
use App\Models\WishList;
use App\Traits\Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use Response;

    public function index(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $product_Controller = new Product_Controller();
        $result = $product_Controller->index($request);

        return ProductResource::collection($result['products']);
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
                }),
                'in_wishList'=> (bool)WishList::where('product_id',$product->id)->where('user_id',Auth::user()->id)->first(),
                'in_cart'=>(bool)Cart::where('product_id',$product->id)->where('user_id',Auth::user()->id)->first()
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

    public function offers($id): \Illuminate\Http\JsonResponse
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
        $product_Controller = new Product_Controller();
        $result = $product_Controller->addToCarts($id);

        if ($result) {
            return $this->success(['result' => 'Item added in your cart.']);
        } else {
            return $this->error('Item already in your cart.');
        }
    }

    public function cartQuantityAdd($id): \Illuminate\Http\JsonResponse
    {
//        $cart = Cart::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
//        if ($cart) {
//            if($cart->quantity < 5){
//                $cart->quantity++;
//                $cart->save();
//                return $this->success(['quantity' => $cart->quantity], 'Change Quantity in ' . $cart->quantity);
//            }
//            return $this->error('Were sorry! Only 5 unit(s) allowed in each order');
//        }
//        return $this->error('Product Not Found in Cart.');
    }

    public function cartQuantityRemove($id): \Illuminate\Http\JsonResponse
    {
//        $cart = Cart::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
//        if ($cart->quantity > 1) {
//            $cart->quantity--;
//            $cart->save();
//            return $this->success(['quantity' => $cart->quantity], 'Change Quantity in ' . $cart->quantity);
//        }
//        return $this->error('Only 1 Quantity less.');
    }

    public function removeFromCart($id): \Illuminate\Http\JsonResponse
    {
        if (Cart::where('product_id', $id)->where('user_id', Auth::user()->id)->delete()) {
            return response()->json(['result' => 'Successfully removed in cart list.']);
        }
        return $this->error('Product not found in cart');
    }

    public function checkInCart($id): \Illuminate\Http\JsonResponse
    {
        $count = Cart::where('user_id', Auth::user()->id)->where('product_id', $id)->count();
        if ($count > 0) {
            return response()->json(['result' => true, 'count' => $count]);
        }
        return response()->json(['result' => false]);
    }

    public function ProductReview(Request $request, $id): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $queryBuilder = ProductRating::where('product_id', $id)->orderBy('created_at', 'DESC')->paginate(10);
        return ProductRatingResource::collection($queryBuilder);
    }

    public function cartList(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return CartResource::collection((new Product_Controller())->cartList());
    }
}
