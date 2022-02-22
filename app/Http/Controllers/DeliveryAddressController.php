<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAddress;
use Illuminate\Support\Facades\Auth;

class DeliveryAddressController extends Controller
{
    public function index()
    {
        return DeliveryAddress::where('user_id', Auth::user()->id)->orderBy('default_address', 'DESC')->paginate(5);
    }
}
