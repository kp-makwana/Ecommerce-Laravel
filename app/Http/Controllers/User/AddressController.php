<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\CartController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DeliveryAddressController;
use App\Http\Requests\DeliveryAddressRequest;
use App\Models\DeliveryAddress;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $address = DeliveryAddressController::index();
        return view('user.Address.index', ['data' => CartController::summary(), 'address' => $address]);
    }

    public function add(Request $request)
    {
        $previousUrl = url()->previous();
        return view('user.Address.add', compact('previousUrl'));
    }

    public function edit($id)
    {
        $previousUrl = url()->previous();
        $address = DeliveryAddress::find($id);
        return view('user.Address.edit', compact(['address', 'previousUrl']));
    }

    public function addOrEdit(DeliveryAddressRequest $request)
    {
        $name = $request->input('name');
        $mobile_number = $request->input('mobile_number');
        $zipcode = $request->input('zipcode');
        $locality = $request->input('locality');
        $address = $request->input('address');
        $city_id = $request->input('city');
        $state = $request->input('state');
        $landmark = $request->input('landmark');
        $alt_phone = $request->input('alt_phone');
        $type = $request->input('type');

        $previousUrl = $request->input('previousUrl');

        if ($request->input('id')) {
            $obj = DeliveryAddress::where('user_id', Auth::user()->id)->where('id', $request->input('id'))->first();
        } else {
            $this->defaultAddressRemove();
            $obj = new DeliveryAddress;
            $obj->user_id = Auth::user()->id;
            $obj->default_address = '1';
        }
        $obj->name = $name;
        $obj->mobile_number = $mobile_number;
        $obj->zipcode = $zipcode;
        $obj->locality = $locality;
        $obj->address = $address;
        $obj->city_id = (int)$city_id;
        $obj->state_id = (int)$state;
        $obj->country_id = State::find($state)->country_id;
        $obj->landmark = $landmark;
        $obj->alt_phone = $alt_phone;
        $obj->type = in_array($type, config('constants.addressType')) ? $type : 'home';
        $obj->save();

        if ($previousUrl == route('user.cart.address')) {
            return redirect()->route('user.cart.address');
        }
        return redirect()->route('user.address.index');
    }

    public function delete(Request $request)
    {
        $result = DeliveryAddress::where('user_id', Auth::user()->id)->where('id', $request->id)->delete();
        if ($result) {
            $obj = DeliveryAddress::where('user_id', Auth::user()->id)->first();
            if ($obj) {
                $obj->default_address = '1';
                $obj->save();
            }
            return response()->json(['result' => true]);
        }
        return response()->json(['result' => false]);
    }

    public function defaultSet(Request $request)
    {
        $this->defaultAddressRemove();
        $obj = DeliveryAddress::where('user_id', Auth::user()->id)->where('id', $request->id)->first();
        $obj->default_address = '1';
        $result = $obj->save();

        return response()->json(['result' => $result]);
    }

    private function defaultAddressRemove()
    {
        DeliveryAddress::where('user_id', Auth::user()->id)->update(['default_address' => '0']);
    }
}
