<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = "colors";
	protected $fillable = [
		'code','color_name'
	];
	public function Product_detail(){
		return $this->hasMany('App\Product_detail','size_id','id');
	}

	public function del($id){
		return Color::find($id)->delete();
	}
	public static function updateData($id, $data){
		$color = Color::find($id);
		$color->update($data);

		return true;
	}
}
