<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function group(){
        // dd($this->hasOne('App\Model\Group', 'creator_id', 'id')->get());
        return $this->hasOne('App\Model\Group', 'creator_id', 'id');
    }

    public function amoeba(){
        return $this->hasOne('App\Model\Amoeba');
    }
}
