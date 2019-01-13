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

    public function getProgressStatusAttribute(){
        
        $status = 1;
        if($this->group->file === null){
            return $status;
        }
        $status = 2;
        if($this->group->file->approve_at === null){
            return $status;
        }
        $status = 3;
        return $status;


    }

}
