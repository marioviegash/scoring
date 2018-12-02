<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Event;
use App\Model\Employee;
use App\Model\Innovator;
use App\Model\Jury;

class EventController extends Controller
{
    //

    public function showAll(){
        $event = Event::all();
        return view('pages.event.index', ['events' => $event]);
    }

    public function showInsert(){
        
        $juries = Jury::with('user')->get();
        // dd($juries);

        return view('pages.event.insert', ['juries' => $juries]);
    }

    public function insert(Request $request){
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'description' => 'required',
            'jury'=> 'required',
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
        $newEvent->description = $request->description;
        $newEvent->jury_id = $request->jury;
        $newEvent->maximum_score = $request->criteria_score;
        $newEvent->save();
        
        foreach($request->criteria_employee as $employee){
            $newEmployee = new Employee();
            $newEmployee->description = $employee;
            $newEvent->criterias()->save($newEmployee);
        }
        
        foreach($request->criteria_innovator as $innovator){
            $newInnovator = new Innovator();
            $newInnovator->description = $innovator;
            $newEvent->innovators()->save($newInnovator);
            
        }
        return redirect('/admin/event');
    }


}
