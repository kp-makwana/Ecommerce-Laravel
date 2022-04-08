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
        $data = CartController::summary();
        $user = Auth::user();

        return $this->success([
            "key" => "rzp_test_7y7xZB7qOMMm5l",
            "amount" => $data['total_price'] * 100,
            "name" => $user->getFullNameAttribute(),
            "description" => "Payment",
            "image" => "https://lh3.googleusercontent.com/a-/AOh14Gh833ThinFrkzBq4_fS-S0KHP552epZx4guGbm_yw=s83-c-mo",
            "allow_rotation" => false,
            "prefill" => [
                "contact" => $user->contact_no,
                "email" => $user->email,
            ],
            "modal" => [
                "animation" => true,
            ],
            "theme" => [
                "color" => "#F0F0F0"
            ]
        ]);
    }

    public function checkPaymentStatus(Request $request)
    {
        Log::info('Data Coming', $request->all());
        dd($request->all());
    }

    public function test()
    {

    }
}
