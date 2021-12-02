<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $data['countries'] = Country::get(["name", "id"]);
        return view('user.editprofile', ['data' => $data, 'user' => Auth::user()]);
    }

    public function fetchStates(Request $request): string
    {
        $getStates = State::where("country_id", $request->country_id)->get();
        return view('components.state', compact('getStates'))->render();
    }

    public function fetchCities(Request $request): string
    {

        $cities = City::where("state_id", $request->stateId)->get();
        return view('components.city', compact('cities'))->render();
    }

}
