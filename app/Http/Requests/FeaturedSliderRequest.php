<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeaturedSliderRequest extends FormRequest
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
        // dd($this->id==null);
        return [
            'title'=>"required|min:4|max:50",
            'image'=>(($this->id==null)?'required|':'nullable|')."mimes:jpg,png,gif,jpeg",
            'desc'=>"required|min:10|max:150",
            'link'=>"required|url|min:15|max:150",
            'buttontext'=>"required|min:4|max:20",
        ];
    }
}
