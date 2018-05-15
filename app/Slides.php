<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    protected $table = "slides";
	protected $fillable = [
		'name','image','link','product_id'
	];
	public function Product(){
        return $this->belongsTo('App\Product','product_id','id');
    }

	public function del($id){
		return Slides::find($id)->delete();
	}
	public static function updateData($id, $data){
		$slide = Slides::find($id);
		$slide->update($data);

		return true;
	}
}
