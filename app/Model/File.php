<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //

    public function group(){
        return $this->belongsTo('App\Model\Group');
    }
}
