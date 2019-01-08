<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //


    public function creator(){
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function employees(){
        return $this->hasMany('App\Model\Employee');
    }

    public function juries(){
        return $this->belongsToMany('App\Model\Jury');
    }

    public function innovators(){
        return $this->hasMany('App\Model\Innovator');
    }

    public function groups(){
        return $this->hasMany('App\Model\Group');
    }
}
