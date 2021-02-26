<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomBook extends Model
{
    protected $table = 'room_book';

    public function khachhang()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function room()
    {
        return $this->belongsTo('App\Room', 'room_id', 'id');
    }
    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employee_id', 'id');
    }
    public function payment_staff()
    {
        return $this->belongsTo('App\Employee', 'payment_staff', 'id');
    }
}
