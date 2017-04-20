<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
    public function product(){ 
    	return $this->hasMany(Product::class,'cat_id');
    }

     public static function boot()
    {
        parent::boot();
        
        // Attach event handler, on deleting of the user
        Category::deleting(function($category)
        {   
            foreach ($category->product as $item) {
                $item->deleteImage($item);
        	}
        });
    }
}
