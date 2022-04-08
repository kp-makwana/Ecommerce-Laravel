<?php

namespace App\Http\Controllers;

use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    use Response;
    public function checkout(Request $request)
    {
        return $this->success([
            "key"=> "rzp_test_7y7xZB7qOMMm5l",
            "amount"=> 2000,
            "name"=> "Tutsmake",
            "description"=> "Payment",
            "image"=> "https=>//lh3.googleusercontent.com/a-/AOh14Gh833ThinFrkzBq4_fS-S0KHP552epZx4guGbm_yw=s83-c-mo",
            "handler"=> "",
            "allow_rotation"=>false,
            "prefill"=> [
                "contact"=> '9988665544',
                "email"=>   'tutsmake@gmail.com',
            ],
            "modal"=>[
                // "confirm_close"=>true,
                "animation"=>true,

            ],
            "theme"=> [
                "color"=> "#F0F0F0"
            ]
        ]);
    }

    public function checkPaymentStatus(Request $request)
    {
        Log::info('Data Coming',$request->all());
        dd($request->all());
    }

    public function test()
    {

    }
}
