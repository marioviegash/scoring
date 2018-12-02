<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jury extends Model
{
    //

    public function user(){
        return $this->belongsTo('App\User');
    }
}
