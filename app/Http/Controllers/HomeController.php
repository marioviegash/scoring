<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Model\Group;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group = Auth::user()->group()->first();
        // dd($group->group_status_id);
        if($group == null){
            return redirect('verification-group');
        }else if($group->group_status_id == 1){
            return redirect('verification-profile');
        }
        $group = Group::with('amoebas.user')->where('group_status_id', 2)->get();
        return view('home', ['groups' => $group]);
    }
}
