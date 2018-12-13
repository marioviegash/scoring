<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Group;
use Mail;
use Auth;
use Carbon\Carbon;
use Hash;

class DocumentController extends Controller
{
    public function index()
    {
        $group = Group::with('amoebas.user')->where('group_status_id', 2)->get();
        return view('document', ['groups' => $group]);
    }
}
