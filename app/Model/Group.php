<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //

    public function amoebas(){
        return $this->hasMany('App\Model\Amoeba');
    }
    public function files(){
        return $this->hasMany('App\Model\File');
    }
    public function file(){
        return $this->hasOne('App\Model\File')->orderBy('created_at', 'desc');
    }
}
