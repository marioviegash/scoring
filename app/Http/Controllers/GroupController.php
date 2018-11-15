<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Group;
use Mail;
use Auth;
use Carbon;
use Hash;

class GroupController extends Controller
{
    //

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

        $group = Group::find($group_id);
        $group->approve_by = Auth::id();
        $group->approve_at = Carbon::now()->timestamp;
        $group->save();

        $group->amoebas()->update([
            'verified'=>true
        ]);
`
        $amoebas = $group->amoebas();

        foreach($amoebas as $amoeba){
            $user = $amoeba->user();
            Mail::send(['password'=>$user->password], $data, function($message) {
                $message->to($user->email, $user->name)->subject('Verify Amoeba');
                $message->from('amoeba@gmail.com','Amoeba Admin');
            });
            $user->password = Hash::make($user->password);
            $user->save();
        }
`
        return true;
    }


}
