<?php

namespace App\Repositories;

use App\Models\UsersTicketsRecompense;
use Carbon\Carbon;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Exception;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Illuminate\Http\Request;
use App\Http\Requests\SearchTicketsRequest;

class UsersTicketsRecompensesRepository
{
    //Recupere tous les gains du client et les affiche par résultat de 8 par pages
    public function getGainsUser($id)
    {
        $users_tickets_recompenses = DB::table('users_tickets_recompenses')
        ->leftJoin('users', 'users_tickets_recompenses.user_id', '=', 'users.id')
        ->leftJoin('recompenses', 'users_tickets_recompenses.recompense_id', '=', 'recompenses.id')
        ->leftJoin('tickets', 'users_tickets_recompenses.ticket_id', '=', 'tickets.id')
        ->select('users.*', 'tickets.*','recompenses.*', 'users_tickets_recompenses.*')
        ->where('users_tickets_recompenses.user_id', '=', $id)
        ->orderByDesc('users_tickets_recompenses.id')
        ->paginate(8);
        return $users_tickets_recompenses;
    }

    //Recupere le nombre total des gains du client
    public function getNbGainsUser($id)
    {
        $users_tickets_recompenses = DB::table('users_tickets_recompenses')
        ->leftJoin('users', 'users_tickets_recompenses.user_id', '=', 'users.id')
        ->leftJoin('recompenses', 'users_tickets_recompenses.recompense_id', '=', 'recompenses.id')
        ->leftJoin('tickets', 'users_tickets_recompenses.ticket_id', '=', 'tickets.id')
        ->select('users.*', 'tickets.*','recompenses.*', 'users_tickets_recompenses.*')
        ->where('users_tickets_recompenses.user_id', '=', $id)
        ->orderByDesc('users_tickets_recompenses.id')
        ->get();
        $nb_gains = count($users_tickets_recompenses);
        return $nb_gains;
    }

    //Recupere le nombre total des gains activé du client
    public function getNbGainsActiveUser($id)
    {
        $users_tickets_recompenses = Ticket::where('user_id', $id)
        ->where('status', 1)
        ->get();
        $nb_gainsActive = count($users_tickets_recompenses);
        return $nb_gainsActive;
    }

    //Recupere le nombre total des gains activé du client
    public function getNbGainsRecupererUser($id)
    {
        $users_tickets_recompenses = Ticket::where('user_id', $id)
            ->where('status', 2)
            ->get();
        $nb_gainsRecuperer = count($users_tickets_recompenses);
        return $nb_gainsRecuperer;
    }

    //Recupere le nombre total de gains de tous les clients, affichage 8 par pages
    public function getAllGains()
    {
        $tickets = DB::table('users_tickets_recompenses')
        ->leftJoin('users', 'users_tickets_recompenses.user_id', '=', 'users.id')
        ->leftJoin('recompenses', 'users_tickets_recompenses.recompense_id', '=', 'recompenses.id')
        ->leftJoin('tickets', 'users_tickets_recompenses.ticket_id', '=', 'tickets.id')
        ->select('users.*', 'tickets.*','recompenses.*', 'users_tickets_recompenses.*')
        ->orderByDesc('users_tickets_recompenses.id')
        ->paginate(8);

        return $tickets;
    }

    public function getGrosLot($users_tickets_recompenses)
    {
        if($users_tickets_recompenses){
            $usersTickets = $users_tickets_recompenses->random(1);
            //dd($gagnants);
            
            foreach($usersTickets as $userTicket){
                $gagnant = UsersTicketsRecompense::where('id', '=', $userTicket->id)
                ->update(['groslot' => 1]);
            }
            return $gagnant;
        } else {
            $gagnant = "";
            return $gagnant;
        }
    }
    
    /**
     * Créer un nouveau ticket
     * @param Ticket $ticket
     * @param int $user_id
     */
    public function create(Ticket $ticket, int $user_id)
    {
    	$user_ticket_recompense = new UsersTicketsRecompense;
        $user_ticket_recompense->user_id = $user_id;
        $user_ticket_recompense->ticket_id = $ticket->id;
        $user_ticket_recompense->recompense_id = $ticket->recompense_id;
        $user_ticket_recompense->groslot = 0;
        $user_ticket_recompense->created_at = Carbon::now();
        $user_ticket_recompense->updated_at = Carbon::now();
        $user_ticket_recompense->save();

        return $user_ticket_recompense;
    }

    public function getGagnant()
    {
    	$gagnant = UsersTicketsRecompense::where('groslot', 1)->get();
        return $gagnant;
    }
}
