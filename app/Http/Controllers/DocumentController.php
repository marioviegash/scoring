<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Group;
use App\Model\Forum;
use App\Model\File;
use App\Model\Event;
use App\Notification\SendToAmoebaNotification;
use Storage;
use Mail;
use Auth;
use Carbon\Carbon;
use Hash;

class DocumentController extends Controller
{
    public function index()
    {
        // dd(Auth::user()->group->id)
        $forums = [];
        $group = Group::with('amoebas.user')->where('group_status_id', 2)->get();
        if(Auth::user()->roles->id === 4)
        {
            $forums = Forum::with('user')->where('group_id', Auth::user()->group->id)->get();
            $group = Auth::user()->amoeba->group;
            // return view('document', ['groups' => $group, 'forums' => $forums, 'amoeba'=>Auth::user()->amoeba]);
        }
        // dd($group->file_status);
        return view('document', ['groups' => $group, 'forums' => $forums, 'amoeba'=>Auth::user()->amoeba]);
    }

    public function showAll(Request $request){

        $event_builder = Event::with('groups')->orderBy('created_at', 'desc');
        if(isset($request->event)){
            $event_builder = $event_builder->where('id', $request->event);
        }
        $event = $event_builder->first();
        $events = Event::orderBy('created_at', 'desc')->get();
        return view('pages.document.index', ['active_event' => $event, 'events' => $events]);
    }

    public function showDetail($group_id){
        $group = Group::with('file')->with('amoebas.user')->find($group_id);

        return view('pages.document.detail', ['group' => $group]);
    }

    public function reveiwDocument($file_id){
        $file = File::with('group')->where('id', $file_id)->first();
        if(isset($file->review_at) === false){
            $file->review_at = Carbon::now();
            $file->save();
        }

        return Storage::download($file->path, $file->name);
    }

    public function approveDocument($file_id){
        $file = File::with('group')->where('id', $file_id)->first();
        $file->approve_at = Carbon::now();
        $file->save();

        
        SendToAmoebaNotification::send(Auth::id(), $file->group->id,  "Document approved.", 
            "http://localhost:8000/admin/document/".$file->group->id."/detail");

        return back();
    }

    public function rejectDocument($file_id){
        $file = File::with('group')->where('id', $file_id)->first();
        $file->approve_at = Carbon::now();
        $file->save();

        SendToAmoebaNotification::send(Auth::id(), $file->group->id,  "Document rejected.", 
            "http://localhost:8000/admin/document/".$file->group->id."/detail");
        return back();
    }

    // public function getDetail($group_id){
    //     $forum = Forum::with('user')->where('group_id', $group_id)->get();

    //     return 
    // }
}
