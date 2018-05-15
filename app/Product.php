<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = "products";
	protected $fillable = [
		'code', 'name','description','unit_price','promotion_price','slug','category_id'
	];
	public function Category(){
    	return $this->belongsTo('App\Category','category_id','id');
    }
    public function Slide(){
        return $this->hasMany('App\Slides','product_id','id');
    }
    public function Bill_detail(){
        return $this->hasMany('App\Bill_detail','product_id','id');
    }
	public function del($id){
		return Product::find($id)->delete();
	}
	public static function updateData($id, $data){
		$product = Product::find($id);
		$product->update($data);

		return true;
	}
}
