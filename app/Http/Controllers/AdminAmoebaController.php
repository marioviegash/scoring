<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\AdminAmoeba;
use App\User;
use App\Model\Group;
use Mail;
use Auth;


class AdminAmoebaController extends Controller
{
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
        ], function($message)use($newUser){
            $message->subject('Success terdaftar di Admin Amoeba');
            $message->from('tedyjohn.tj@gmail.com');
            $message->to($newUser->email);
        });

        return redirect('admin/user');
    }

    public function saveProfile(Request $request){
        $request->validate([
            'division_id' => 'required',
            'picture' => 'required|mimes:jpeg,bmp,png'
        ]);
        $ama = Auth::user()->admin_amoeba;
        $file = $request->file('picture');
        if(isset($file)){
            $destinationPath = "img/upload/profile";
            $filename = uniqid().$file->getClientOriginalName();
            $filename = str_replace(" ", "", $filename);
            $fullpath = $destinationPath.'/'.$filename;
            $file->move( $destinationPath,$filename);
            $ama->picture = $fullpath;
        }
        $ama->division_id = $request->division_id;
        $ama->save();

        return redirect('/profile');
    }
}
