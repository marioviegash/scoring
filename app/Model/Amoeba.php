<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Amoeba extends Model
{
    //

    public function group(){
        return $this->belongsTo('App\Model\Group');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
