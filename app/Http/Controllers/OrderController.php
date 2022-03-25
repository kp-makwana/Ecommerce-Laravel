<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DeliveryAddress;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderStatus;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function payment()
    {
        return view('user.Cart.payment');
    }

    public function placeOrder(): \Illuminate\Http\RedirectResponse
    {
        $data = CartController::summary();

        $address = DeliveryAddress::where('user_id', Auth::id())->where('default_address', 1)->first(['id']);
        $order_status = OrderStatus::first();

        $date = date('Y-m-d', strtotime(now()));

        $order = new Order;
        $order->user_id = Auth::id();
        $order->order_date = $date;
        $order->order_amount = $data['price'];
        $order->discount = $data['discount'];
        $order->shipping_amount = $data['delivery_Charges'];
        $order->shipping_amount = $data['delivery_Charges'];
        $order->shipping_date = $data['total_price'] ?? 0;
        $order->shipping_date = $date;
        $order->shipping_address_id = $address->id;
        $order->billing_address_id = $address->id;
        $order->order_status_id = $order_status->id;

        if ($order->save()) {
            foreach ($data['carts'] as $item) {
                $order_item = new OrderDetails;
                $order_item->order_id = $order->id;
                $order_item->product_id = $item['id'];
                $order_item->quantity = $item['count'];
                $order_item->price = $item['price'];
                $order_item->discount = $item['product_discount'];
                if ($order_item->save()) {
                    Cart::find($item['id'])->delete();
                }
            }
        }
        return redirect()->route('user.order.index');
    }
}
