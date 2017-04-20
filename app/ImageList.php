<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ImageList extends Model
{
	protected $fillable = ['product_id', 'picture'];

	public function brand(){ 
		return $this->belongsTo(Product::class);
	}
	public function deleteImageList($image){
		Storage::delete('public/'.$image->picture);
	}
}
