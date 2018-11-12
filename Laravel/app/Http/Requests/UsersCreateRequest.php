<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersCreateRequest extends FormRequest
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
            'name'      => 'required',
            'email'     => 'required|unique:users',
            'password'  => 'required',
            'sex'       => 'required',
            'dob'       => 'required|before:1995/01/01',
            'mobile'    => 'required|unique:users',
            'address'   => 'required',
            'role'      => 'required',
            'photo'     => 'image|mimes:jpeg,png,jpg',
        ];
    }
}
