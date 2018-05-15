<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
{
    protected $table = "product_details";
	protected $fillable = [
		'quantity','color_id','size_id','product_id',
	];
	public function Size(){
    	return $this->belongsTo('App\Size','size_id','id');
    }
    public function Color(){
    	return $this->belongsTo('App\Color','color_id','id');
    }
    public function Image(){
        return $this->hasMany('App\Image','product_detail_id','id');
    }
	public function del($id){
		return Product_detail::find($id)->delete();
	}
	public static function updateData($id, $data){
		$product_detail = Product_detail::find($id);
		$product_detail->update($data);

		return true;
	}
}
