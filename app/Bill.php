<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";
	protected $fillable = [
		'date_order', 'total_price','payment','note','user_id'
	];
	public function User(){
    	return $this->belongsTo('App\User','user_id','id');
    }
    public function Bill_detail(){
        return $this->hasMany('App\Bill_detail','bill_id','id');
    }
}
