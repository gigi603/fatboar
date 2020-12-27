<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Authenticatable
{
    use Notifiable;

    protected $table = "tickets";

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

    function recompense(){
        return $this->hasOne('App\Models\Recompense');
    }

    function users_tickets_recompenses(){
        return $this->hasMany('App\Models\UsersTicketsRecompense');
    }
}
