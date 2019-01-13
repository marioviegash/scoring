<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Model\Amoeba;
use App\User;
use App\Model\Group;



class SettingController extends Controller
{
    //

    public function index(){
        

        $members = Auth::user()->amoeba->group->amoebas;
        $amoeba = Auth::user()->amoeba;
        return view('setting', ['members'=>$members, 'amoeba' => $amoeba, 'group' => Auth::user()->amoeba->group]);
    }

    public function updateGroup(Request $request){
        
        $request->validate([
            'logo' => 'mimes:jpeg,bmp,png',
        ]); 
        $group = Auth::user()->amoeba->group;

        $file = $request->file('logo');
        if(isset($file)){
        
            $destinationPath = "img/upload/group";
            $filename = uniqid().$file->getClientOriginalName();
            $filename = str_replace(" ", "", $filename);
            $fullpath = $destinationPath.'/'.$filename;
            $file->move( $destinationPath,$filename);
            $group->logo = $fullpath;

        }
        
        
        
        $group->name= $request->name;
        $group->description = $request->description;
        $group->batch_id = $request->batch;
        $group->save();

        return back();
    }

    public function updateProfile(Request $request){
        $request->validate([
            'nik' => 'digits:6',
            'picture' => 'mimes:jpeg,bmp,png'
        ]); 
        
        $amoeba = Amoeba::where('user_id', Auth::id())->first();
        
        $file = $request->file('picture');
        if(isset($file)){
            $destinationPath = "img/upload/profile";
            $filename = uniqid().$file->getClientOriginalName();
            $filename = str_replace(" ", "", $filename);
            $fullpath = $destinationPath.'/'.$filename;
            $file->move( $destinationPath,$filename);
            $amoeba->picture = $fullpath;
    
        }
        
        // $amoeba->name = $request->name;
        $amoeba->nik = $request->nik;
        $amoeba->loker = $request->loker;
        $amoeba->c_level = $request->c_level;
        $amoeba->work_place = $request->work_place;
        $amoeba->save();

        $user = Auth::user();

        $user->name= $request->name;
        $user->save();
        return back();
    }

    public function addMember(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);
        $newUser = new User();

        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = str_random(8);
        $newUser->save();

        $newAmoeba = new Amoeba();
        $newAmoeba->group_id = Auth::user()->groupLeader()->first()->id;
        $newUser->amoeba()->save($newAmoeba);

        return back();
    }

}
