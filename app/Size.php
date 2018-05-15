<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
	protected $table = "sizes";
	protected $fillable = [
		'size'
	];
	public function Product_detail(){
		return $this->hasMany('App\Product_detail','size_id','id');
	}

	public function del($id){
		return Size::find($id)->delete();
	}
	public static function updateData($id, $data){
		$size = Size::find($id);
		$size->update($data);

		return true;
	}
}
