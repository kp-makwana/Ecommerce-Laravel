<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\CommonController;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{

    public function index()
    {
        $queryBuilder = WishList::with(['productImage','product'])->where('user_id', Auth::id())->paginate(10);
//        $products = $queryBuilder->map(function ($query) {
//            $discount = CommonController::productDiscount($query->product_id);
//            $salePrice = $query->product->sale_price;
//            return [
//                'id' => $query->id,
//                'product_id' => $query->product_id,
//                'product_name' => $query->product->name,
//                'count' => $query->quantity,
//                'product_image' => asset('storage/ProductImages/' . $query->productImage[0]->name),
//                'original_price' => $salePrice,
//                'price' => $salePrice - $discount,
//            ];
//        });
        return view('user.myWishlist', ['products' => $queryBuilder, 'data' => (new CartController)->summary()]);
    }

    public function addOrRemoveWishList($id): \Illuminate\Http\JsonResponse
    {
        $result = WishList::where('product_id', $id)->first();
        if ($result) {
            $result->delete();
            return Response()->json(['delete', 'Item Remove From Cart.']);
        } else {
            $wish = new WishList;
            $wish->user_id = Auth::id();
            $wish->product_id = $id;
            $wish->insert_date = now();
            $wish->save();
            return Response()->json(['added', 'Item added in Cart.']);
        }
    }

    public function removeToWishList($product_id)
    {
        WishList::where('user_id',Auth::id())->where('product_id',$product_id)->delete();
            return redirect()->back()->with(['info'=>'Product remove in wishlist']);
    }

    public function checkInWishList($id): \Illuminate\Http\JsonResponse
    {
        $result = WishList::where('product_id', $id)->first();
        if ($result) {
            return response()->json(['result' => true, 'message' => 'item Found in wishList']);
        }
        return response()->json(['result' => false, 'message' => 'item Not Found in wishList.']);
    }
}
