<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersUpdateRequest extends FormRequest
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
            //
            'name'      => 'required',
            'email'     => 'required',
            'sex'       => 'required',
            'dob'       => 'required|before:1995/01/01',
            'mobile'    => 'required',
            'address'   => 'required',
            'photo'     => 'image|mimes:jpeg,png,jpg',
        ];
    }
}
