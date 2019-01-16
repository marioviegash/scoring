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
    
    public function graph(){
        return $this->hasOne('App\Model\DocumentGraph');
    }

    public function scoreData(){
        return $this->hasOne('App\Model\ScoreAmoeba', 'group_id');
    }
    public function getScoreAttribute(){
        return $this->scoreData->score;
    }

    public function getCriteriaAttribute(){
        $maximum_score = $this->group->event->maximum_score;
        return $this->score < ceil($maximum_score/2)-1 ? 'Employee' : 
        ($this->score <  ceil($maximum_score/2)+1 ? 'Innovator B' : 'Innovator A' );
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
