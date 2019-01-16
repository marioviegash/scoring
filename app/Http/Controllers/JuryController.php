<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Jury;
use App\User;
use App\Model\Group;
use Mail;
use Auth;
class JuryController extends Controller
{
    //
    
    public function add(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);
        $password = str_random(8);
        $newUser = new User();

        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password =  bcrypt($password);
        $newUser->role_id = 3;
        $newUser->save();

        $newAmoeba = new Jury();
        $newUser->amoeba()->save($newAmoeba);

        Mail::send('emails.register', [
            'user' => $newUser,
            'password' => $password
        ], function($message)use($newUser){
            $message->subject('Success terdaftar di Admin Amoeba');
            $message->from('hello@digitalamoeba.id');
            $message->to($newUser->email);
        });

        return redirect('\admin\user');
    }
    public function saveProfile(Request $request){
        $request->validate([
            'nik' => 'required|unique:amoebas|digits:6',
            'loker' => 'required'
        ]); 
        
        $jury = Auth::user()->jury;
        $jury->NIK = $request->nik;
        $jury->loker = $request->loker;
        $jury->save();

        return redirect('/profile');
    }
}
