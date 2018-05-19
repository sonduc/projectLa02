<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "images";
	protected $fillable = [
		'name','image','product_detail_id'
	];
	public function ProductDetailImages(){
        return $this->hasMany('App\ProductDetailImages','product_detail_id','id');
    }
	public function del($id){
		return Image::find($id)->delete();
	}
	public static function updateData($id, $data){
		$image = Image::find($id);
		$image->update($data);

		return true;
	}
}
