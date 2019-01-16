<?php

namespace App\Http\Controllers;

use App\Model\Event;
use Illuminate\Http\Request;
use App\Model\Group;
use Mail;
use Auth;
use Carbon\Carbon;
use Hash;
use Route;
use App\Model\Role;

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
        // dd($lastEvent
        // dd(Auth::user()->role_name);
        if(Auth::user()->role_name === Role::$SUPER_ADMIN){
            $lastEvent = Event::with('groups')->with('juries')->with('creator')->
            orderBy('created_at', 'desc')->first();
            // dd($lastEvent->creator);
            $group = Group::with('amoebas.user')->where('group_status_id', 2)->get();
            $event = Event::all();
            return view('home', ['groups' => $group, 'events' => $event, 'lastEvent' => $lastEvent]);
        }else if(Auth::user()->role_name === Role::$AMOEBA){    
            // $lastEvent = Event::with('groups')->with('juries')->with('creator')->
            // orderBy('created_at', 'desc')->first();
            // dd($lastEvent->creator);
            return view('home', ['user' => Auth::user(), 'amoeba' => Auth::user()->amoeba]);
        }else if(Auth::user()->role_name === Role::$JURY){    
            // $lastEvent = Event::with('groups')->with('juries')->with('creator')->
            // orderBy('created_at', 'desc')->first();
            // dd($lastEvent->creator);

            $events = Event::with('groups')->with('juries')-whereHas('juries', function($q){
                $q->where('jury.id', Auth::user()->id);
            })->get();;
            return view('home', ['events' => $events]);
        }
        // dd(Route::currentRouteName());
        $group = Group::with('amoebas.user')->where('group_status_id', 2)->get();
        $event = Event::all();
        return view('home', ['groups' => $group, 'events' => $event]);
    }
}