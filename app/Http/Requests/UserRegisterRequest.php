<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

//use Illuminate\Support\Facades\Validator;

class UserRegisterRequest extends FormRequest
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
            'first_name' => 'required|min:3|max:25',
            'last_name' => 'required|min:3|max:25',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,contact_no',
            'gender' => 'required|not_in:0',
            'dob' => 'required',
            'password' => 'required|min:3|max:25',
            'c_password' => 'required',
//            'c_password'=>'equalTo:#password',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First Name is required',
            'first_name.min' => 'min 3 Character required',
            'first_name.max' => 'Maximum 25 Character required',
            'last_name.required' => 'Last Name is required',
            'last_name.min' => 'min 3 Character required',
            'last_name.max' => 'Maximum 25 Character required',
            'email..email' => 'Enter Email in Proper Format',
            'email.required' => 'Enter Email in Proper Format',
            'email.unique' => 'Email is Already Registered Enter Different Email',
            'phone.number' => 'Please enter valid Mobile Number',
            'phone.required' => 'Mobile Number Is required',
            'phone.unique' => 'Mobile Number Is already Exist',
            'gender.required' => 'Please Select gender',
            'gender.not_in' => 'Please Select gender',
            'dob.required' => 'Please Enter Your birthday',
            'password.required' => 'Please Enter Password',
            'password.min' => 'Enter Minimum 3 Character',
            'password.max' => 'Maximum Character is 25',
            'c_password.required' => 'Confirm Password is required',
//            'c_password.equalTo'=>'Password not match',
        ];
    }
}
