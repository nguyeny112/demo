<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = ['pname', 'preview', 'detail', 'spec','image','cat_id','brand_id','rating','price','discount','qty','tags'];

    public function category(){ 
    	return $this->belongsTo(Category::class,'cat_id');
    }
    public function brand(){ 
    	return $this->belongsTo(Brand::class);
    }
    public function order_detail(){ 
    	return $this->hasMany(Order_Detail::class);
    }
    public function imageList(){ 
    	return $this->hasMany(ImageList::class);
    }

    public static function boot()
    {
        parent::boot();
        
        // Attach event handler, on deleting of the user
        self::deleting(function($thumb_image)
        {   
            // dd($image);
            foreach ($thumb_image->imageList as $image) {
                $image->deleteImageList($image);
            }
        });
    }

    public function deleteImage($delProduct){
        // dd($this);
        // dd($delProduct);
        if($delProduct->image!=''){
            Storage::delete('public/'.$delProduct->image);
        }
    }
}
