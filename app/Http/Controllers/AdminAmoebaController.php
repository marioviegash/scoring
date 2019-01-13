<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\AdminAmoeba;
use App\User;
use App\Model\Group;
use Mail;


class AdminAmoebaController extends Controller
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
        $newUser->role_id = 2;
        $newUser->save();

        $newAmoeba = new AdminAmoeba();
        $newUser->amoeba()->save($newAmoeba);

        Mail::send('emails.register', [
            'user' => $newUser,
            'password' => $password
        ], function($message)use($user){
            $message->subject('Success terdaftar di Admin Amoeba');
            $message->from('tedyjohn.tj@gmail.com');
            $message->to($newUser->email);
        });

        return back();
    }
}
