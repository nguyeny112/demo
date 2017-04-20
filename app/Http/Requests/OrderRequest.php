<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name'=>"required|min:4|max:20",
            'phone'=>'required|min:10|max:15',
            'detail'=>'nullable|max:200',
            'email'=>'required|email|max:30',
            'address'=>'required|max:230|min:10'
        ];
    }
     public function messages()
    {
        return [
           
        ];
    }
}
