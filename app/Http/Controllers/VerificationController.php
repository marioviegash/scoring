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
        if(Auth::user()->group()->first() != null){
            return redirect('verification-profile');
        }
        return view('register.group');
    }

    public function viewProfile(){
        if(Auth::user()->group()->first() == null){
            return redirect('verification-group');
        }
        if(Auth::user()->amoeba()->first() != null){
            return redirect('verification-one');
        }
        return view('register.profile');
    }

    public function viewFriendOne(){
        if(Auth::user()->group()->first() == null){
            return redirect('verification-group');
        }else if(Auth::user()->amoeba()->first() == null){
            return redirect('verification-profile');
        }
        if(Auth::user()->group()->first()->amoebas()->count() >1){
            return redirect('verification-two');
        }
        return view('register.friend-one');
    }
    
    public function viewFriendTwo(){
        if(Auth::user()->group()->first() == null){
            return redirect('verification-group');
        }else if(Auth::user()->amoeba()->first() == null){
            return redirect('verification-profile');
        }else if(Auth::user()->group()->first()->amoebas()->count() ==1){
           return redirect('verification-one');
        }
        if(Auth::user()->group()->first()->amoebas()->count() > 2){
            return redirect('verification-success');
        }
        return view('register.friend-two');
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
        $newAmoeba = new Amoeba();
        
        $newAmoeba->position = $request->division;
        $newAmoeba->work_place = $request->work_place;
        $newAmoeba->c_level = $request->c_level;
        
        $newAmoeba->user_id = Auth::id();
        $newAmoeba->group_id = Auth::user()->group()->first()->id;

        $newAmoeba->save();

        return redirect("/verification-one");
    }

    private function saveFriend($request){
        $newUser = new User();

        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = str_random(8);
        $newUser->save();

        $newAmoeba = new Amoeba();
        $newAmoeba->group_id = Auth::user()->group()->first()->id;
        $newUser->amoeba()->save($newAmoeba);
    }

    public function inviteFriendOne(Request $request){
       
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users'
        ]);
        $this->saveFriend($request);

        return redirect('verification-two');
    }

    public function inviteFriendTwo(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users'
        ]);

        $this->saveFriend($request);

        $group = Auth::user()->group()->first();
        $group->group_status_id = 2;
        $group->save();
        return redirect('verification-success');
    }
}
