<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    public static $SUPER_ADMIN = "Super Admin";
    public static $AMA = "Admin Amoeba";
    public static $AMOEBA = "Amoeba";
    public static $JURY = "JURI";
    
}
