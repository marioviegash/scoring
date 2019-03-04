<?php

namespace App\Notifications;

use App\Model\Notification;

class SendNotification
{
    //
    public $user_id, $send_to, $message, $url;
    
    function __construct($user_id, $send_to, $message, $url){
        $user_id = $user_id;
        $send_to = $send_to;
        $message = $message;
        $url = $url;
    }

    public static function send($user_id, $send_to, $message, $url){
        $notification = new Notification();
        $notification->user_id = $user_id;
        $notification->send_to = $send_to;
        $notification->message = $message;
        $notification->url = $url;
        $notification->save();
    }
    
}
