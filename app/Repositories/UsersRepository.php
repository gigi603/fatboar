<?php

namespace App\Repositories;

use App\Http\Requests\EditRequest;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\User;
use App\Models\Contact;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Your Model

/**
 * Class UsersRepository.
 */
class UsersRepository
{

    public function store(EditRequest $request, $id)
    {
        $user = User::find($id);
        $user->nom                  =   $request->nom;
        $user->prenom               =   $request->prenom;
        $user->email                =   $request->email;
        $user->telephone            =   $request->telephone;
        $date = explode('/', $request->date_naissance);
        $user->date_naissance = $date[2].'-'.$date[1].'-'.$date[0];
        $user->save();

        return $user;
    }

    public function getAllAdmins()
    {
        $admins = User::where('role_id', '=', 4)->get();
        return $admins;
    }

    public function getAllUsers()
    {
        $users = User::where('role_id', '=', 1)->orderBy('id', 'desc')->paginate(6);
        return $users;
    }

    public function recupererGain($id)
    {
        $ticket = Ticket::where('id', '=', $id)
                          ->where('status', 1)
                          ->update(['status' => 2]);
        return $ticket;
    }
    public function getMessagesRecus()
    {
        $this->getAllAdmins();
        $messagesRecus = Contact::where('role_id', '=', 4 )
                                ->where('email_destinataire', Auth::user()->email)
                                ->orderBy('id', 'desc')
                                ->get();
        return $messagesRecus;
    }

    public function getMessagesEnvoyesByCaissiere()
    {
        $this->getAllAdmins();
        $messagesEnvoyes = Contact::where('role_id', '=', 2)
                              ->where('email_expediteur', Auth::user()->email)
                              ->orderBy('id', 'desc')
                              ->get();
        return $messagesEnvoyes;
    }

    public function getMessagesEnvoyesByManager()
    {
        $this->getAllAdmins();
        $messagesEnvoyes = Contact::where('role_id', '=', 3)
                              ->where('email_expediteur', Auth::user()->email)
                              ->orderBy('id', 'desc')
                              ->get();
        return $messagesEnvoyes;
    }

    public function getMessagesEnvoyesByAdmin()
    {
        $this->getAllAdmins();
        $messagesEnvoyes = Contact::where('role_id', '=', 4)
                              ->where('email_expediteur', Auth::user()->email)
                              ->orderBy('id', 'desc')
                              ->get();
        return $messagesEnvoyes;
    }

    public function getAllGainsUsers()
    {
        $tickets = Ticket::all();
        return $tickets;
    }

    public function getNbTotalGains()
    {
        $tickets = Ticket::all();
        $total_tickets = count($tickets);
        return $total_tickets;
    }

    public function getAllTicketsActive()
    {
        $tickets_active = Ticket::where('status', '=', 1)->get();
        return $tickets_active;
    }

    public function getNbTotalTicketsActive()
    {
        $tickets_active = Ticket::where('status', '=', 1)->get();
        $total_tickets_active = count($tickets_active);
        return $total_tickets_active;
    }

    public function getAllTicketsRecupere()
    {
        $tickets_recupere = Ticket::where('status', '=', 2)->get();
        return $tickets_recupere;
    }

    public function getNbTotalTicketsRecupere()
    {
        $tickets_recupere = Ticket::where('status', '=', 2)->get();
        $total_tickets_recupere = count($tickets_recupere);
        return $total_tickets_recupere;
    }

    public function getAllEntreeOrDessertRecupere()
    {
        $entreeOuDessertAuChoix_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 1)->get();
        return $entreeOuDessertAuChoix_recupere;
    }

    public function getNbTotalEntreeOrDessertRecupere()
    {
        $entreeOuDessertAuChoix_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 1)->get();
        $nombreEntreeOuDessertAuChoix_recupere = count($entreeOuDessertAuChoix_recupere);
        return $nombreEntreeOuDessertAuChoix_recupere;
    }

    public function getAllBurgerAuChoixRecupere()
    {
        $burgerAuChoix_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 2)->get();
        return $burgerAuChoix_recupere;
    }

    public function getNbTotalBurgerAuChoixRecupere()
    {
        $burgerAuChoix_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 2)->get();
        $nombreBurgerAuChoix_recupere = count($burgerAuChoix_recupere);
        return $nombreBurgerAuChoix_recupere;
    }

    public function getAllMenuDuJourRecupere()
    {
        $menuDuJour_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 3)->get();
        return $menuDuJour_recupere;
    }

    public function getNbTotalMenuDuJourRecupere()
    {
        $menuDuJour_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 3)->get();
        $nombreMenuDuJour_recupere = count($menuDuJour_recupere);
        return $nombreMenuDuJour_recupere;
    }

    public function getAllMenuAuChoixRecupere()
    {
        $menuAuChoix_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 4)->get();
        return $menuAuChoix_recupere;
    }

    public function getNbTotalMenuAuChoixRecupere()
    {
        $menuAuChoix_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 4)->get();
        $nombreMenuAuChoix_recupere = count($menuAuChoix_recupere);
        return $nombreMenuAuChoix_recupere;
    }

    public function getAllReductionRecupere()
    {
        $reduction_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 5)->get();
        return $reduction_recupere;
    }

    public function getNbTotalReductionRecupere()
    {
        $reduction_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 5)->get();
        $nombreReduction_recupere = count($reduction_recupere);
        return $nombreReduction_recupere;
    }

    public function getNbTotalTicketsRestants()
    {
        $tickets = Ticket::all();
        $total_tickets = count($tickets);
        $tickets_recupere = Ticket::where('status', '=', 2)->get();
        $total_tickets_recupere = count($tickets_recupere);
        $nombre_tickets_restants = $total_tickets - $total_tickets_recupere;
        return $nombre_tickets_restants;
    }

    public function getRestaurants()
    {
        $restaurants = DB::table('restaurants')->paginate(6);
        return $restaurants;
    }

    public function getPersonnels()
    {
        $personnels = User::with('role')->where('role_id', '>=', 2)->paginate(6);
        return $personnels;
    }
}
