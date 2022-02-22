<?php

namespace App\Http\Requests\API;

use App\Traits\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class UserSignupRequest extends FormRequest
{
    use Response;
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
            'gender' => 'required|not_in:0',
            'dob' => 'required',
            'phone' => 'required|unique:users,contact_no',
            'password' => 'required|min:3|max:25',
            'c_password' => 'required|required_with:password|same:password',
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
            'c_password.required_with' => 'required_with',
            'c_password.same' => 'Password and Confirm password not match.',
            'c_password.required'=>'Confirm password is required.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->error($validator->errors()->first(), JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
