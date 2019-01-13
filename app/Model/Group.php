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
    public function event(){
        return $this->belongsTo('App\Model\Event');
    }
    public function getFileStatusAttribute(){
        $status = 0;
        if($this->file === null){
            return $status;
        }
        $status = 1;
        if($this->file->review_at === null){
            return $status;
        }
        $status = 2;
        if($this->file->approve_at === null){
            return $status;
        }
        $status = 3;
        return $status;

    }
}
