<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'orders';
	protected $primaryKey = 'id';

	protected $fillable = [
        'payment_id', 'status','username','useremail','amount','useraddress','userphone','fullname','moreinfo'
    ];
    protected $events = [
        'created'=> Events\NewOrderThanks::class,
    ];
    public function payment(){ 
    	return $this->belongsTo(Payment::class);
    }
    public function order_detail(){ 
    	return $this->hasMany(Order_Detail::class);
    }
}
