<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Model\Role;
use App\Model\Jury;

class UserController extends Controller
{
    public function showAll()
    {   
        $users = User::with('roles')->get();

        return view('pages.user-management.index', ['users'=> $users]);
    }

    public function showInsert($role){
        return view('pages.user-management.insert', ['role' => $role]);
    }

    public function insert(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role'=> 'required'
        ]);

        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = bcrypt($request->password);
        $newUser->role_id = $request->role;
        $newUser->save();
        if($request->role === '3'){
            $jury = new Jury();
            $jury->nik = $request->nik;
            $jury->loker = $request->loker;
            $newUser->jury()->save($jury);
        }

        return redirect('/admin/user');
    }
}
