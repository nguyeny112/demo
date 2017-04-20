<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeaturedSlider extends Model
{
       protected $fillable = ['title','desc','link','image_path','buttontext'];

     //    public function getLinkAttribute($value)
	    // {
	    //     return "<a href='".$value."' title='' target='no_blank'>".$value."</a>";
	    // }
}
