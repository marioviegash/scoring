<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Model\Role;

class UserController extends Controller
{
    public function showAll()
    {   
        $users = User::with('roles')->get();

        return view('pages.user-management.index', ['users'=> $users]);
    }

    public function showUpdate($id){
        $user = User::find($id);
        $roles = Role::all();

        return view('pages.user-management.update', ['user' => $user, 'roles'=> $roles]);
    }

    public function showInsert(){
        $roles = Role::all();
        return view('pages.user-management.insert', ['roles' => $roles]);
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

        return redirect('/admin/user');
    }
}
