<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = "categories";
    protected $fillable = [
        'name', 'slug',
    ];
    public function Product(){
        return $this->hasMany('App\Product','category_id','id');
    }
    public function del($id){
        return Category::find($id)->delete();
    }
    public static function updateData($id, $data){
        $category = Category::find($id);
        $category->update($data);

        return true;
    }
}
