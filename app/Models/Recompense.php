<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Recompense extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];

    function user(){
        return $this->belongsTo('App\Models\User');
    }

    function ticket(){
        return $this->belongsTo('App\Models\Ticket');
    }

    function users_tickets_recompenses(){
        return $this->hasMany('App\Models\UsersTicketsRecompense');
    }
}