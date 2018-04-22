<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = [
        'numero','floor','status'
    ];
    public function booking(){
        return $this->belongsTo('App\Booking');
    }
    public function hotel(){
        return $this->belongsTo('App\Hotel');
    }
}
