<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\CartController;
use App\Http\Controllers\Controller;
use App\Models\DeliveryAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $address = DeliveryAddress::where('user_id', Auth::user()->id)->get();
        return view('user.address.index', ['data' => CartController::summary(), 'address' => $address]);
    }

    public function add(Request $request)
    {
        $name = $request->input('name');
        $mobile_number = $request->input('mobile_number');
        $zipcode = $request->input('zipcode');
        $locality = $request->input('locality');
        $address = $request->input('address');
        $city_id = $request->input('city_id');
        $landmark = $request->input('landmark ');
        $alt_phone = $request->input('alt_phone');
        $type = $request->input('type');

        $obj = new DeliveryAddress;
        $obj->user_id = Auth::user()->id;
        $obj->name = $name;
        $obj->mobile_number = $mobile_number;
        $obj->zipcode = $zipcode;
        $obj->locality = $locality;
        $obj->address = $address;
        $obj->city_id = $city_id;
        $obj->landmark = $landmark;
        $obj->alt_phone = $alt_phone;
        $obj->type = in_array($type, config('constants.addressType')) ? $type : 'home';
        $obj->save();
        return redirect()->route('user.address.index');
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $mobile_number = $request->input('mobile_number');
        $zipcode = $request->input('zipcode');
        $locality = $request->input('locality');
        $address = $request->input('address');
        $city_id = $request->input('city_id');
        $landmark = $request->input('landmark ');
        $alt_phone = $request->input('alt_phone');
        $type = $request->input('type');

        $obj = DeliveryAddress::where('user_id', Auth::user()->id)->where('id', $id)->first();
        $obj->name = $name;
        $obj->mobile_number = $mobile_number;
        $obj->zipcode = $zipcode;
        $obj->locality = $locality;
        $obj->address = $address;
        $obj->city_id = $city_id;
        $obj->landmark = $landmark;
        $obj->alt_phone = $alt_phone;
        $obj->type = $type;
        $obj->save();
        return redirect()->route('user.address.index');
    }

    public function delete($id)
    {
        return response()->json(['result' => true]);
        $result = DeliveryAddress::where('user_id', Auth::user()->id)->where('id', $id)->delete();
        if ($result) {
            return response()->json(['result' => true]);
        }
        return response()->json(['result' => false]);
    }
}
