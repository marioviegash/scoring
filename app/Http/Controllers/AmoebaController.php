<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

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

}
