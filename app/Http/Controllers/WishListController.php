<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
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

    public function checkInWishList($id): \Illuminate\Http\JsonResponse
    {
        $result = WishList::where('product_id', $id)->first();
        if ($result) {
            return response()->json(['result'=>true,'message'=>'item Found in wishList']);
        }
        return response()->json(['result'=>false,'message'=>'item Not Found in wishList.']);
    }

}
