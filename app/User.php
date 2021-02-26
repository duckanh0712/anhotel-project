<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

//    protected $guard = 'web';
    protected  $fillable = [
        'name', 'email', 'password'
    ];
    protected $hidden = [
        'password'
    ];

    public function roomBook ()
    {
        return $this->hasMany('App\RoomBook', 'user_id', 'id');
    }
}
