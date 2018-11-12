<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //

    public function amoebas(){
        return $this->hasMany('App\Model\Amoeba');
    }
}
