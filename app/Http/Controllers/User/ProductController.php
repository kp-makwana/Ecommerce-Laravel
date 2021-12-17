<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController as Product_Controller;
use App\Traits\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use Response;
    public function addToCart($id)
    {
        $result = Product_Controller::addToCarts($id);
        if ($result){
            return $this->success($result);
        }else{
            return $this->error('Item not add to cart');
        }
    }
}
