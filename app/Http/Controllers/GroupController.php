<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Group;
use Mail;
use Auth;
use Carbon\Carbon;
use Hash;

class GroupController extends Controller
{
    public function index()
    {
        $group = Group::with('amoebas.user')->where('group_status_id', 2)->get();
        return view('group', ['groups' => $group]);
    }

    public function store(Request $request){
        
        $file = $request->file('image');
        
        $destinationPath = "img/upload/group";
        $filename = uniqid().$file->getClientOriginalName();
        $filename = str_replace(" ", "", $filename);
        $fullpath = $destinationPath.'/'.$filename;
        $file->move( $destinationPath,$filename);

        $newGroup = new Group();

        $newGroup->name = $request->name;
        $newGroup->description = $request->description;
        $newGroup->logo = $fullpath;
        $newGroup->creator_id = Auth::id();
        $newGroup->save();
    }

    public function approveGroup($group_id){

        $activeEvent = Event::orderBy('created_at', 'desc')->first();
        $group = Group::find($group_id);
        $group->approve_by = Auth::id();
        $group->approve_at = Carbon::now();
        $group->event_id = $activeEvent->first();
        $group->save();

        $group->amoebas()->update([
            'verified'=>true
        ]);
        $amoebas = $group->amoebas()->get();
        
        foreach($amoebas as $key => $amoeba){
            if($key === 1){
                continue;
            }
            $user = $amoeba->user()->first();
            if($group->creator_id === $user->id){
                continue;
            }
            Mail::send('emails.register', [
                'user' => $user,
                'password' => $user->password
            ], function($message)use($user){
                $message->subject('Success terdaftar di amoeba');
                $message->from('tedyjohn.tj@gmail.com');
                $message->to($user->email);
            });
            $user->password = bcrypt($user->password);
            $user->save();
        }

        return redirect('/group');
    }

    public function rejectGroup($group_id){

        Group::find($group_id)->delete();
        return back();
    }

    
    public function deleteGroup($group_id){
        Group::find($group_id)->delete();
        return back();
    }

}
