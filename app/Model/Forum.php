<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    //

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function group(){
        return $this->belongsTo('App\User');
    }
}
