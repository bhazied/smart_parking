<?php

namespace App\Model;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

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

    public function country()
    {
        return $this->belongsTo('App\Model\Country');
    }
    
    public function cars()
    {
        return $this->hasMany('App\Model\Car', 'creator_user_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }


    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    private function hasRole($role)
    {
        $role = $this->roles()->where('name', $role)->first();
        if ($role) {
            return true;
        }
        return false;
    }

    public function getListRoleAttribute()
    {
        $roles = '';
        foreach ($this->roles as $role) {
            $roles .= ','.$role->name;
        }
        return ltrim($roles, ',');
    }
}
