<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class SettingController extends Controller
{
    //

    public function index(){
        

        $members = Auth::user()->amoeba->group->amoebas;
        $amoeba = Auth::user()->amoeba;
        return view('setting', ['members'=>$members, 'amoeba' => $amoeba]);
    }

}
