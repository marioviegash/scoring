<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //

    public function criterias(){
        return $this->hasMany('App\Model\Criteria');
    }

    public function innovators(){
        return $this->hasMany('App\Model\Innovator');
    }


}
