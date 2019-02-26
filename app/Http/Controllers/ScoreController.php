<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Event;
use App\Model\Group;
use App\Model\Amoeba;
use App\Model\Innovator;
use App\Model\Criteria;
use Carbon\Carbon;
use Auth;

use App\Model\ScoreGroup;

use App\Model\ScoreAmoeba;
class ScoreController extends Controller
{
    //


    public function index(){

    }

    public function showGroup(){
        $groups = Event::where('start_time', '<=', Carbon::now())->where('end_date', '>=', Carbon::now())->first()->groups;
        // $groups = Group::where('event_id', )
        // dd($groups);
        return view('pages.scoring.index', ['groups' => $groups]);
    }
    public function showGroupDetail(Request $request){
        $group = Group::where('id', $request->group)->first();
        // dd('ads');
        return view('pages.scoring.description', ['group'=>$group]);
    }
    public function bisnis($id){
        $group = Group::where('id', $id)->first();
        // dd($group->graph->path);
        return view('pages.scoring.business', ['group'=>$group]);
    }

    public function scoreToGroup(Request $request){
        // dd($group->graph->path);
        $scoreExist = ScoreGroup::where('group_id', $request->group_id)
        ->where('score_by',Auth::user()->jury->id) ->first();
        if($scoreExist === null){
            $newScoreGroup = new ScoreGroup();
            $newScoreGroup->group_id = $request->group_id;
            $newScoreGroup->score_by = Auth::user()->jury->id;
            $newScoreGroup->Score = $request->score;
            $newScoreGroup->save();
        }else{
            
            $scoreExist->Score = $request->score;
            $scoreExist->save();
        }
        return redirect('scoring/people/'.$request->group_id);
    }

    
    public function showResult(){
        $groups = array();
        $event = Event::where('start_time', '<=', Carbon::now())->where('end_date', '>=', Carbon::now())->first();
        // dd($event);
        if($event !== null){
            $groups = $event->groups;
        }
        // $groups = Group::where('event_id', )
        // dd($groups);
        return view('result', ['groups' => $groups]);
    }

    public function scoreToAmoebas(Request $request){


        foreach($request->scores as $key => $score){
            $scoreExist = ScoreAmoeba::where('group_id', $key)
            ->where('score_by',Auth::user()->jury->id) ->first();
            
            if($scoreExist === null){
                $newScoreGroup = new ScoreAmoeba();
                $newScoreGroup->group_id = $key;
                $newScoreGroup->score_by = Auth::user()->jury->id;
                $newScoreGroup->score = $score;
                $newScoreGroup->save();
            }else{
                
                $scoreExist->score = $score;
                $scoreExist->save();
            }
        }
        return redirect('/scoring');
    }

    public function people($id){
        $event = Event::where('start_time', '<=', Carbon::now())->where('end_date', '>=', Carbon::now())->first();
        // dd($event->employees); 
        $amoebas = Amoeba::where('group_id', $id)->get();
        // $innovators = Criteria::where('event_id', )
        return view('pages.scoring.people', ['amoebas'=> $amoebas, 'event'=>$event]);
    }
}
