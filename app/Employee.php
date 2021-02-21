<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

//    protected $guard = 'employee';
    protected  $fillable = [
        'name', 'email', 'password'
    ];
    protected $hidden = [
        'password'
    ];
}
