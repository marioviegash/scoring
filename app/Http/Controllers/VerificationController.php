<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Group;
use App\Model\Amoeba;
use Auth;
use App\User;

class VerificationController extends Controller
{
    //

    public function viewGroup(){
        if(Auth::user()->groupLeader()->first() != null){
            return redirect('verification-profile');
        }
        return view('register.group');
    }

    public function viewProfile(){
        if(Auth::user()->groupLeader()->first() == null){
            return redirect('verification-group');
        }
        if(Auth::user()->amoeba()->first() != null){
            return redirect('verification-friend');
        }
        return view('register.profile');
    }

    public function viewFriend(){
        if(Auth::user()->group()->first() == null){
            return redirect('verification-group');
        }else if(Auth::user()->amoeba()->first() == null){
            return redirect('verification-profile');
        }
        if(Auth::user()->group()->first()->amoebas()->count() > 1){
            return redirect('verification-success');
        }
        return view('register.friend');
    }

    public function verifyGroup(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'logo' => 'required|mimes:jpeg,bmp,png',
        ]); 
        
        $file = $request->file('logo');
        
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

        return redirect("/verification-profile");
    }

    public function verifyProfile(Request $request){
        $request->validate([
            'c_level' => 'required',
            'work_place' => 'required',
        ]); 
        $newAmoeba = new Amoeba();

        $newAmoeba->work_place = $request->work_place;
        $newAmoeba->c_level = $request->c_level;
        
        $newAmoeba->user_id = Auth::id();
        $newAmoeba->group_id = Auth::user()->groupLeader()->first()->id;

        $newAmoeba->save();

        return redirect("/verification-friend");
    }

    private function saveFriend($request){
        $newUser = new User();

        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = str_random(8);
        $newUser->save();

        $newAmoeba = new Amoeba();
        $newAmoeba->group_id = Auth::user()->groupLeader()->first()->id;
        $newUser->amoeba()->save($newAmoeba);
    }

    public function inviteFriend(Request $request){
        $request->validate([
            'name' => 'required|array',
            'email' => 'required|array',
            'email.*' => 'required|email|unique:users,email'
        ]);
        foreach($request->name as $key => $name){
            
            $this->saveFriend((Object)['name'=> $name, 'email' => $request->email[$key] ]);
        }
        $group = Auth::user()->groupLeader()->first();
        $group->group_status_id = 2;
        $group->save();
        return redirect('verification-success');
    }
    
    public function viewSuccess(){
        if(Auth::user()->group()->first() == null){
            return redirect('verification-group');
        }else if(Auth::user()->amoeba()->first() == null){
            return redirect('verification-profile');
        }else if(Auth::user()->group()->first()->amoebas()->count() == 1){
           return redirect('verification-friend');
        }
        if(Auth::user()->group()->first()->aprrove_at !== null){
            return redirect('/');
        }
        return view('register.success');
    }
}
