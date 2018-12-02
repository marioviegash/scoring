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
        // return $this->hasOne('App\Model\Group', 'creator_id', 'id');
        if($this->amoeba === null) return null;
        return $this->amoeba()->first()->group();
    }

    public function groupLeader(){
        
        return $this->hasOne('App\Model\Group', 'creator_id', 'id');
    }

    public function juries(){
        return $this->belongsToMany('App\Model\Jury');
    }

    public function headGroup(){
        // dd($this->hasOne('App\Model\Group', 'creator_id', 'id')->get());
        return $this->hasOne('App\Model\Group', 'creator_id', 'id');
        // return $this->amoeba()->first()->group();
    }

    public function roles(){
        return $this->belongsTo('App\Model\Role', 'role_id');
    }

    public function amoeba(){
        return $this->hasOne('App\Model\Amoeba');
    }
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles);
        }
        return $this->hasRole($roles);
    }
    public function hasAnyRole($roles)
    {
        // dd($this->roles()->first());
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
}
