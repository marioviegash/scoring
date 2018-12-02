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
        if($request->role === '3'){
            $request->validate([
                'nik' => 'required|digits:6',
                'loker' => 'required'
            ]); 
        }

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

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'role'=> 'required'
        ]);
        if($request->role === '3'){
            $request->validate([
                'nik' => 'required|digits:6',
                'loker' => 'required'
            ]);
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->role_id = $request->role;
        $user->save();

        if($request->role === '3'){
            $jury = Jury::find($user->jury->id);
            $jury->nik = $request->nik;
            $jury->loker = $request->loker;
            $user->jury()->save($jury);
        }

        return redirect('/admin/user');
    }
}
