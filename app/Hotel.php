<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    //
    protected $fillable = ['name','city','rooms','photo'];
    
    public function rooms(){
        return $this->hasMany('App\Room');
    }
}
