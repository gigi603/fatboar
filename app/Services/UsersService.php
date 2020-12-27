<?php

namespace App\Services;

use App\Repositories\UsersRepository;
use App\Repositories\TicketsRepository;
use App\Repositories\UsersTicketsRecompensesRepository;
use App\Repositories\ContactsRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\EditRequest;
use App\Models\User;

class UsersService
{
    protected $tickets_repository;
    protected $users_repository;
    protected $users_tickets_recompense_repository;
    protected $contacts_repository;

    public function __construct(TicketsRepository $tickets_repository,
        UsersTicketsRecompensesRepository $users_tickets_recompense_repository,
        UsersRepository $users_repository,
        ContactsRepository $contacts_repository)
    {
        $this->users_repository = $users_repository;
        $this->tickets_repository = $tickets_repository;
        $this->users_tickets_recompense_repository = $users_tickets_recompense_repository;
        $this->contacts_repository = $contacts_repository;
    }

    //Met à jour le profil du client
    public function getEditProfile(EditRequest $request, $id)
    {
        $user = $this->users_repository->store($request, $id);
    }

    // Récupère les gains du client
    public function getGainsUser($id)
    {
        return $this->users_tickets_recompense_repository->getGainsUser($id);
    }

    // Récupère les gains du client
    public function getNbGainsUser($id)
    {
        return $this->users_tickets_recompense_repository->getNbGainsUser($id);
    }
    // Récupère les gains du client
    public function getNbGainsActiveUser($id)
    {
        return $this->users_tickets_recompense_repository->getNbGainsActiveUser($id);
    }

    // Récupère les gains du client
    public function getNbGainsRecupererUser($id)
    {
        return $this->users_tickets_recompense_repository->getNbGainsRecupererUser($id);
    }

    //Recupere le nombre total de gains de tous les clients
    public function getAllGains()
    {
        return $this->users_tickets_recompense_repository->getAllGains();
    }

    public function getGagnant()
    {
        return $this->users_tickets_recompense_repository->getGagnant();
    }
    public function getGrosLot($users_tickets_recompenses)
    {
        return $this->users_tickets_recompense_repository->getGrosLot($users_tickets_recompenses);
    }

    public function recupererGain($id)
    {
        return $this->users_repository->recupererGain($id);
    }

    //Parcourt tous les tickets et active le ticket saisie si elle figure dans la bdd et qu'elle n'a pas été activée
    public function getAllTickets(string $numero_ticket)
    {
        $tickets = $this->tickets_repository->get();
        $user_id = Auth::user()->id;

        foreach ($tickets as $ticket) {
            if ($numero_ticket == $ticket->numero_ticket && $ticket->status == 0) {
                // Permet d'activer un ticket
                $this->tickets_repository->update($ticket, $user_id);
                // Créer un nouveau UsersTicketsRecompense
                return $this->users_tickets_recompense_repository->create($ticket, $user_id);
            }
        }
    }

    public function getAllUsers()
    {
        return $this->users_repository->getAllUsers();
    }

    public function getMessagesRecus()
    {
        return $this->users_repository->getMessagesRecus();
    }

    public function getMessagesEnvoyesByCaissiere()
    {
        return $this->users_repository->getMessagesEnvoyesByCaissiere();
    }

    public function getMessagesEnvoyesByManager()
    {
        return $this->users_repository->getMessagesEnvoyesByManager();
    }

    public function getMessagesEnvoyesByAdmin()
    {
        return $this->users_repository->getMessagesEnvoyesByAdmin();
    }

    public function getAllGainsUsers()
    {
        return $this->users_repository->getAllGainsUsers();
    }

    public function getNbTotalGains()
    {
        return $this->users_repository->getNbTotalGains();
    }

    public function getAllTicketsActive()
    {
        return $this->users_repository->getAllTicketsActive();
    }

    public function getNbTotalTicketsActive()
    {
        return $this->users_repository->getNbTotalTicketsActive();
    }

    public function getAllTicketsRecupere()
    {
        return $this->users_repository->getAllTicketsRecupere();
    }

    public function getNbTotalTicketsRecupere()
    {
        return $this->users_repository->getNbTotalTicketsRecupere();
    }

    public function getAllEntreeOrDessertRecupere()
    {
        return $this->users_repository->getAllEntreeOrDessertRecupere();
    }

    public function getNbTotalEntreeOrDessertRecupere()
    {
        return $this->users_repository->getNbTotalEntreeOrDessertRecupere();
    }

    public function getAllBurgerAuChoixRecupere()
    {
        return $this->users_repository->getAllBurgerAuChoixRecupere();
    }

    public function getNbTotalBurgerAuChoixRecupere()
    {
        return $this->users_repository->getNbTotalBurgerAuChoixRecupere();
    }

    public function getAllMenuDuJourRecupere()
    {
        return $this->users_repository->getAllMenuDuJourRecupere();
    }

    public function getNbTotalMenuDuJourRecupere()
    {
        return $this->users_repository->getNbTotalMenuDuJourRecupere();
    }

    public function getAllMenuAuChoixRecupere()
    {
        return $this->users_repository->getAllMenuAuChoixRecupere();
    }

    public function getNbTotalMenuAuChoixRecupere()
    {
        return $this->users_repository->getNbTotalMenuAuChoixRecupere();
    }

    public function getAllReductionRecupere()
    {
        return $this->users_repository->getAllReductionRecupere();
    }

    public function getNbTotalReductionRecupere()
    {
        return $this->users_repository->getNbTotalReductionRecupere();
    }

    public function getNbTotalTicketsRestants()
    {
        return $this->users_repository->getNbTotalTicketsRestants();
    }

    public function sendMailToAdminsByGuest($request, $admin)
    {
        return $this->contacts_repository->sendMailToAdminsByGuest($request, $admin);
    }

    public function sendMailToAdminsByConnectedUsers($request, $user, $admin)
    {
        return $this->contacts_repository->sendMailToAdminsByConnectedUsers($request, $user, $admin);
    }

    public function getRestaurants()
    {
        return $this->users_repository->getRestaurants();
    }

    public function getPersonnels()
    {
        return $this->users_repository->getPersonnels();
    }

}
