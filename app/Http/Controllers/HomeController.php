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
        $group = Group::with('amoebas.user')->where('group_status_id', 2)->get();
        return view('home', ['groups' => $group]);
    }
}
