<?php

namespace App\Http\Requests\API;

use App\Traits\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            'f_name' => 'required|min:3|max:25',
            'l_name' => 'required|min:3|max:25',
            'phone' => 'required', Rule::unique('users', 'contact_no')->ignore(Auth::user()->id),
            'email' => 'required', Rule::unique('users', 'email')->ignore(Auth::user()->id),
            'zipcode' => 'min:6|max:6',
        ];
    }

    public function messages()
    {
        return [
            'f_name.max' => 'Enter Maximum 25 character',
            'f_name.min' => 'Enter Minimum 3 character',
            'l_name.max' => 'Enter Maximum 25 character',
            'l_name.min' => 'Enter Minimum 3 character',
            'phone.Rule' => 'Phone Number is already',
            'email.Rule' => 'Email Not in Proper Format',
            'zipcode' => 'Zipcode is Must Be 6 Number',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->error($validator->errors()->first(), JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
