<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    use Response;

    public function checkout(Request $request)
    {
        $summary = (new CartController)->summary();
        $user = Auth::user();

        $notes = '';
        foreach($summary['carts'] as $key => $item){
            if ($key == 0){
                $notes = $item['product_name'];
            }else{
                $notes .= " | ".$item['product_name'];
            }
        }

        $api = new Api('rzp_test_5N0PbdN26WjVNH', 'pwVtwJGPJbs5j6oFkJEdVL9h');
        $razorpayOrder = $api->order->create(array('receipt' => time(), 'amount' => $summary['total_price'] * 100, 'currency' => 'INR', 'notes' => array('product_name' => $notes)));

        if(!empty($razorpayOrder['id'])){
            $payment = new Payment;
            $payment->user_id = Auth::id();
            $payment->razorpay_order_id = $razorpayOrder['id'];
            $payment->save();
        }

        return $this->success([
            "key" => "rzp_test_5N0PbdN26WjVNH",
            "amount" => $summary['total_price'] * 100,
            "name" => env('APP_NAME'),
            "order_id" => $razorpayOrder['id'],
            "description" => "Payment",
            "image" => asset('images/logo.png'),
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

    public function verify(Request $request)
    {
        $razorpay_payment_id = $request->razorpay_payment_id;
        $razorpay_order_id = $request->razorpay_order_id;
        $razorpay_signature = $request->razorpay_signature;

        $api = new Api('rzp_test_5N0PbdN26WjVNH', 'pwVtwJGPJbs5j6oFkJEdVL9h');
        if (empty($razorpay_payment_id) == false) {
            try {
                // Please note that the razorpay order ID must
                // come from a trusted source (session here, but
                // could be database or something else)
                $attributes = array(
                    'razorpay_order_id' => $razorpay_order_id,
                    'razorpay_payment_id' => $razorpay_payment_id,
                    'razorpay_signature' => $razorpay_signature
                );

                $payment = Payment::where('razorpay_order_id',$razorpay_order_id)->first();
                $order = (new OrderController())->placeOrder($payment->id);

                $api->utility->verifyPaymentSignature($attributes);

                // Payment status update
                $payment->order_id = $order['id'];
                $payment->razorpay_payment_id = $razorpay_payment_id;
                $payment->razorpay_signature = $razorpay_signature;
                $payment->status = 'completed';
                $payment->save();

                $data = $this->success($order,'Payment success');
            } catch (\Exception $e) {
                $data = $this->error($e->getMessage());
            }
        }
        return $data;
    }
}
