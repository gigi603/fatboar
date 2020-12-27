<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','nom', 'prenom', 'email', 'telephone', 'date_naissance','majeur','cgu', 'newsletter', 'password','provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    function tickets(){
        return $this->hasMany('App\Models\Ticket');
    }

    public function role() {
        return $this->belongsTo('App\Models\Role');
    }

    function recompenses(){
        return $this->hasMany('App\Models\Recompense');
    }

    function user_tickets_recompenses(){
        return $this->hasMany('App\Models\UsersTicketsRecompense', 'users_tickets_recompenses', 'user_id', 'recompense_id');
    }
    

}
