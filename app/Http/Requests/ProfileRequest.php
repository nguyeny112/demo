<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ProfileRequest extends FormRequest
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
        // dd($this->request);
        return [
            'name' => 'required',
            'password'=> 'nullable|min:4|max:20|confirmed',
            'address' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'avatar' => 'nullable|mimes:jpeg,gif,png,jpg|max:2000'
        ];
    }
}
