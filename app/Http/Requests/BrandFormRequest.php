<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandFormRequest extends FormRequest
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
        // dd($this);
        $brand = $this->brand;
        return [
            'name'=>"required|min:4|max:20|unique:brands,brand_name,".$brand,
        ];
    }
     public function messages()
    {
        return [
            'name.required'=>'Please Enter Brand Name',
            'name.min'=>'Brand Name has at least 8 characters',
            'name.max'=>'Brand Name has less than 20 characters'
        ];
    }
}
