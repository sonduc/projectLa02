<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = "users";

    protected $fillable = [
        'name', 'email', 'address', 'phone_number', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function Bill(){
        return $this->hasMany('App\Bill','user_id','id');
    }
    
    public function del($id){
        return User::find($id)->delete();
    }
    public static function updateData($id, $data){
        $user = User::find($id);
        $user->update($data);

        return true;
    }
}
