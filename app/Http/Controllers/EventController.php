<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Event;
use App\Model\Employee;
use App\Model\Innovator;
use App\Model\Jury;
use App\Model\Group;
use Route;
use Auth;

class EventController extends Controller
{
    //

    public function showAll(Request $request){
        $event_builder = Event::with('employees')->with('creator')->with('innovators');
        if(isset($request->start_date) && isset($request->end_date)){
            $event_builder = $event_builder->where('start_date', '>=', $request->start_date)
                ->where('end_date', '<=', $request->end_date);
        }
        $event = $event_builder->get();
        // dd($event->employees);
        return view('pages.event.index', ['events' => $event]);
    }

    public function showInsert(){
        
        $juries = Jury::with('user')->get();
        // dd($juries);

        return view('pages.event.insert', ['juries' => $juries]);
    }

    public function showDetail($id)
    {
        $event = Event::with('groups')->with('employees')->with('juries')
        ->with('innovators')->where('id', $id)->first();
        $jurie_ids = [];
        foreach($event->juries as $jury){
            array_push($jurie_ids, $jury->id);
        }
        $juries = Jury::with('user')->whereNotIn('id', $jurie_ids) ->get();
        return view('pages.event.detail', ['event' => $event, 'juries' => $juries]);
    }

    public function showGroup($id)
    {
        $group = Group::with('amoebas.user')->where('id', $id)->first();

        return view('pages.event.group', ['group' => $group]);
    }
    
    public function showUpdate($id){
        $event = Event::with('employees')->with('innovators')->where('id', $id)->first();
        $juries = Jury::with('user')->get();
        return view('pages.event.update', ['event' => $event, 'juries'=> $juries]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'required',
            // 'jury'=> 'required',
            'juries' => 'required|array',
            'juries.*'=> 'required',
            'criteria_group' => 'required',
            'criteria_individu' => 'required',
            'criteria_employee' => 'required|array',
            'criteria_employee.*' => 'required',
            'criteria_innovator' => 'required|array',
            'criteria_innovator.*' => 'required',
            'criteria_score' => 'required|numeric'
        ]); 
        $newEvent = Event::find($id);
        $newEvent->name = $request->name;
        $newEvent->start_date = $request->start_date;
        $newEvent->end_date = $request->end_date;
        $newEvent->criteria_group = $request->criteria_group;
        $newEvent->criteria_individu = $request->criteria_individu;
        $newEvent->description = $request->description;
        // $newEvent->jury_id = $request->jury;
        $newEvent->maximum_score = $request->criteria_score;
        $newEvent->save();
        
        $newEvent->employees()->delete();
        $newEvent->innovators()->delete();

        $newEvent->juries()->sync([]);
        
        foreach($request->juries as $jury_id){
            $jury = Jury::find($jury_id);
            $newEvent->juries()->save($jury);
        }

        foreach($request->criteria_employee as $employee){
            $newEmployee = new Employee();
            $newEmployee->description = $employee;
            $newEvent->employees()->save($newEmployee);
        }
        
        foreach($request->criteria_innovator as $innovator){
            $newInnovator = new Innovator();
            $newInnovator->description = $innovator;
            $newEvent->innovators()->save($newInnovator);
            
        }
        return redirect('/admin/event');

    }

    public function delete(Request $request, $id){
        Event::find($id)->delete();
        return redirect('/admin/event');
    }

    public function insert(Request $request){
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'required',
            'juries' => 'required|array',
            'juries.*'=> 'required',
            'criteria_group' => 'required',
            'criteria_individu' => 'required',
            'criteria_employee' => 'required|array',
            'criteria_employee.*' => 'required',
            'criteria_innovator' => 'required|array',
            'criteria_innovator.*' => 'required',
            'criteria_score' => 'required|numeric'
        ]); 
        
        $newEvent = new Event();
        $newEvent->name = $request->name;
        $newEvent->start_date = $request->start_date;
        $newEvent->end_date = $request->end_date;
        $newEvent->criteria_group = $request->criteria_group;
        $newEvent->criteria_individu = $request->criteria_individu;
        $newEvent->description = $request->description;
        $newEvent->created_by = Auth::user()->id;
        // $newEvent->jury_id = $request->jury;
        $newEvent->maximum_score = $request->criteria_score;
        $newEvent->save();

        
        foreach($request->juries as $jury_id){
            $jury = Jury::find($jury_id);
            $newEvent->juries()->save($jury);
        }
        
        foreach($request->criteria_employee as $employee){
            $newEmployee = new Employee();
            $newEmployee->description = $employee;
            $newEvent->employees()->save($newEmployee);
        }
        
        foreach($request->criteria_innovator as $innovator){
            $newInnovator = new Innovator();
            $newInnovator->description = $innovator;
            $newEvent->innovators()->save($newInnovator);
            
        }
        return redirect('/admin/event');
    }


    public function deleteJury(Request $request){
        $event = Event::find($request->event_id);

        $event->juries()->detach($request->jury_id);

        return back();
    }

    public function addJuries(Request $request){
        $event = Event::find($request->event_id);
        foreach($request->juries as $jury_id){
            $event->juries()->attach($jury_id);
        }

        return back();
    }

    public function showEventRun(Request $request){
        
        $events = Event::orderBy('created_at', 'desc')->get();
        $activeEvent = $events[0];
        if(isset($request->event)){
            $activeEvent = Event::where('id', $request->event)->first();
        }
        
        return view('pages.result.index', ['events' => $events, 'activeEvent'=> $activeEvent]);
    }

    public function showResultDetail($id){
        
        $group = Group::find($id);
        // $groups = Group::where('event_id', )
        // dd($groups);
        return view('pages.result.detail', ['group' => $group]);
    }
}
