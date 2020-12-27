<?php

namespace App\Repositories;

use App\Models\Ticket;

class TicketsRepository
{
    public function get()
    {
        return Ticket::all();
    }

    public function update(Ticket $ticket, int $user_id)
    {
    	$ticket->status = 1;
        $ticket->user_id = $user_id;
        $ticket->save();
    }
}
