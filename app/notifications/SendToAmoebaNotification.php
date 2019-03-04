<?php

namespace App\Notification;

use App\Model\Notification;
use App\User;
use App\Model\Group;

class SendToAmoebaNotification
{
    //
    public $user_id, $send_to, $message, $url;
    
    function __construct($user_id, $send_to, $message, $url){
        $user_id = $user_id;
        $send_to = $send_to;
        $message = $message;
        $url = $url;
    }

    public static function sendToGroup($send_to, $group_id, $message, $url){
        $amoebas = Group::where('id', $group_id)->first()->amoebas;
        foreach ($amoebas as $key => $amoeba) {
            # code...
            SendNotification::send($amoeba->user->id, $send_to, $message, $url);
        }
    }
    
}
