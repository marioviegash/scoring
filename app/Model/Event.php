<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //

    public function employees(){
        return $this->hasMany('App\Model\Employee');
    }

    public function innovators(){
        return $this->hasMany('App\Model\Innovator');
    }


}