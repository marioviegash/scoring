<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Forum;
use Auth;
use App\Model\Group;

class ForumController extends Controller
{
    //

    public function comment(Request $request){
        $request->validate([
                'comment'=> 'required'
            ]);
        
        $forum = new Forum();
        $forum->user_id = Auth()->id();
        $forum->file_id = $request->file_id;
        $forum->comment=  $request->comment;
        $forum->save();

        return redirect()->back();
    }

    public function index($group_id){
        $group = Group::find($group_id);
        $forums = Forum::with('user')->where('group_id', $group_id)->get();
        return view('forum', ['forums' => $forums, 'group' => $group]);
    }

    public function post(Request $request){
        
        if(Auth::user()->roles->id === 4){
            // dd(Auth::user()->group);
            if(Auth::user()->group()->find($request->group_id) === null){
                return back();
            }
        }
        $request->validate([
            'comment' => 'required'
        ]);
        $forum = new Forum();
        $forum->comment = $request->comment;
        $forum->group_id = $request->group_id;
        $forum->user_id = Auth::id();

        $forum->save();

        
        return redirect()->back();
    }

    // public function getCommentAjax($file_id){
        
    //     return Forum::where('file_id', $file_id)->orderBy('created_at', 'desc')->get();
    // }
}