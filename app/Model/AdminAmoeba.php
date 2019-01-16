<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminAmoeba extends Model
{
    //
    public function division(){
        return $this->belongsTo('App\Model\Division');
    }
}
