<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Group;
use App\Model\Forum;
use Mail;
use Auth;
use Carbon\Carbon;
use Hash;

class DocumentController extends Controller
{
    public function index()
    {
        // dd(Auth::user()->group->id)
        $forums = [];
        $group = Group::with('amoebas.user')->where('group_status_id', 2)->get();
        if(Auth::user()->roles->id === 4)
        {
            $forums = Forum::with('user')->where('group_id', Auth::user()->group->id)->get();
        }
        return view('document', ['groups' => $group, 'forums' => $forums]);
    }

    // public function getDetail($group_id){
    //     $forum = Forum::with('user')->where('group_id', $group_id)->get();

    //     return 
    // }
}
