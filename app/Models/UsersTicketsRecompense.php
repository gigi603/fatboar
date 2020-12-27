<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class UsersTicketsRecompense extends Authenticatable
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
        return $this->belongsTo('App\Models\User', 'user_id', 'ticket_id', 'recompense_id');
    }

    function ticket(){
        return $this->belongsTo('App\Models\Ticket', 'ticket_id');
    }

    function recompense(){
        return $this->belongsTo('App\Models\Recompense', 'recompense_id');
    }

}
