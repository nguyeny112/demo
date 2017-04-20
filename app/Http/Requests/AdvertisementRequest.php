<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisementRequest extends FormRequest
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
            'desc'=>'max:100',
            'title'=>'required|min:4|max:20',
            'link'=>'required|url',
            'picture'=>(($this->advertisement==null)?'required|':'').'mimes:jpeg,bmp,png,gif'
        ];
    }
}
