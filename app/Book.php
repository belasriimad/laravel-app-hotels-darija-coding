<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = [
        'date_in','date_out','user_id','room_id'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function room(){
        return $this->belongsTo('App\Room');
    }
}
