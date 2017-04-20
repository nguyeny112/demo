<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\MessageBag;
class ProductRequest extends FormRequest
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
        // dd(MessageBag::all());
        $rules = [
            'name'=>'required|min:10|max:20|unique:products,pname,'.$this->product,
            'price'=>'required|numeric|min:10000|max:100000000',
            'discount'=>'nullable|numeric|max:100|min:0',
            'picture'=>(($this->product==null)?'required|':'').'mimes:jpeg,bmp,png,gif|max:2000',
            'brand'=>'exists:brands,id',
            'category'=>'exists:categories,id',
            'tags'=>'nullable|max:100',
            'pictureList'=>'numberfileupload:3'
        ];

       $pictureList = count($this->input('pictureList'));
        foreach(range(0, $pictureList) as $index) {
            $rules['pictureList.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
        }


        return $rules;
    }
    public function messages()
    {
        return [
            'category.exists'=>'Please choose a category',
            'brand.exists'=>'Please choose a brand',
            'picture.max'=> 'Thumbnail Image size must be lighter than :max Kb',
            'picture.mimes'=> 'Please upload file with these extension only: JPG,BMP,PNG,GIF',
            'mimes'=>'One of images in Image List has invalid extension',
            'size'=>'Size of One of images in Image List is over the limit',
            'image'=>'File upload must be an image.',
            'numberfileupload'=>'Please dont upload >3 images'
        ];
    }
}
