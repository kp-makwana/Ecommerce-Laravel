<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:25',
            'mobile_number' => 'required|min:10',
            'zipcode' => 'required',
            'locality' => 'required|max:25',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'landmark' => 'min:3|max:25',
            'alt_phone' => 'min:10',
            'type' => 'required',
        ];
    }
}
