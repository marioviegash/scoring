<?php

namespace App\Notification;

use App\Model\Notification;
use App\User;

class SendToAmaNotification
{
    //
    public $user_id, $send_to, $message, $url;
    
    function __construct($user_id, $send_to, $message, $url){
        $user_id = $user_id;
        $send_to = $send_to;
        $message = $message;
        $url = $url;
    }

    public static function send($send_to, $message, $url){
        $users = User::where('role_id', 2)->get();
        foreach ($users as $key => $user) {
            # code...
            SendNotification::send($user->id, $send_to, $message, $url);
        }
    }
    
}
