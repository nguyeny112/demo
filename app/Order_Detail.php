<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
	protected $table = 'order_details';
		protected $fillable = [
		'order_id','product_id','quantity'
	];
    public function product(){ 
    	return $this->belongsTo(Product::class);
    }
    public function order(){ 
    	return $this->belongsTo(Order::class);
    }
}
