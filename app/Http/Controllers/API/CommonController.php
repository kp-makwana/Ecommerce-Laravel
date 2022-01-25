<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{
    use Response;
    public function fetchCountry()
    {
        $countries = Country::all('name','id','country_code');
        $data = $countries->map(function ($q){
            return [
                'id'=>$q->id,
                'name'=>$q->name,
                'code'=>(int)$q->country_code
            ];
        });
        return $this->success($data);
    }

    public function fetchStates()
    {

    }

    public function fetchCities()
    {

    }
}
