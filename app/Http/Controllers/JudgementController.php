<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Group;
class JudgementController extends Controller
{
    //

    public function index(){
        $groups = Group::get();
        return view('pages.judgement.index', ['groups' => $groups]);
    }
}
