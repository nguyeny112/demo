<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'username' => (($this->user==null)?'required|min:4|max:20|':'').'unique:users,username,'.$this->user,
            'name' => 'required',
            'password'=> (($this->user==null)?'required|min:4|max:20|':'').'confirmed',
            'address' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:users,email,'.$this->user,
            'avatar' => 'nullable|mimes:jpeg,gif,png,jpg|max:2000'
        ];
    }
}
