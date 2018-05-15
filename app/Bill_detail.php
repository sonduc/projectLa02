<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    protected $table = "bill_details";
	protected $fillable = [
		'quantity', 'unit_price','bill_id','product_id',
	];
	public function Bill(){
    	return $this->belongsTo('App\Bill','bill_id','id');
    }
    public function Product(){
    	return $this->belongsTo('App\Product','product_id','id');
    }
}
