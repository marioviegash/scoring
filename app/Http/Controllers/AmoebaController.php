<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Model\Amoeba;
class AmoebaController extends Controller
{
    //

    public function store(Request $request){    

        $newAmoeba = new Amoeba();
        
        $newAmoeba->position = $request->division;
        $newAmoeba->work_place = $request->work_place;
        $newAmoeba->c_level = $request->c_level;
        
        $newAmoeba->user_id = Auth::id();
        $newAmoeba->group_id = Auth::user()->group()->id;

        $newAmoeba->save();

        return view();
    }

    public function inviteFriend(Request $request){
        $newUser = new User();

        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = str_random(8);
        $newUser->save();

        $newAmoeba = new Amoeba();
        $newAmoeba->group_id = Auth::user()->group()->id;
        $newUser->amoeba()->save($newAmoeba);

        return view();
    }

    public function showProfile(){
        
        $amoeba = Amoeba::where('user_id', Auth::id())->with('group')->with('user')->first();
        // dd($amoeba);
        return view('profile', ['amoeba'=> $amoeba]);
    }
    public function saveProfile(Request $request){
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
        $amoeba->position = $request->position;
        $amoeba->c_level = $request->c_level;
        $amoeba->work_place = $request->work_place;
        $amoeba->save();

        return redirect('/profile');
    }

}
