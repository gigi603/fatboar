<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CodeRequest;
use App\Http\Requests\EditRequest;
use App\Http\Requests\SearchTicketsRequest;
use DateTime;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Models\User;
use App\Models\Role;
use App\Models\Ticket;
use App\Models\Recompense;
use App\Models\Restaurant;
use App\Models\UsersTicketsRecompense;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Services\UsersService;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Exception;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;


class UsersController extends Controller
{
    protected $users_service;

    public function __construct(UsersService $users_service)
    {
        $this->middleware('auth');
        $this->users_service = $users_service;
    }

    // Profile de chaque utilisateur connecté
    public function profile($id)
    {
        $users_tickets_recompenses = $this->users_service->getGainsUser($id);
        $nb_gains = $this->users_service->getNbGainsUser($id);
        $user = User::find($id);
        return view('communs.profile')->with('user', $user)->with('nb_gains', $nb_gains);
    }

    public function edit(EditRequest $request, $id)
    {
        $user = Auth::user();
        try {
            $profile = $this->users_service->getEditProfile($request, $id);
        } catch(Exception $e){
            Bugsnag::notifyException($e);
            return redirect()->back()->with("activated", "L'action n'a pas pu être effectuée.");
        }
        return redirect()->back()->with('user', $user);
    }

    // Méthodes du client
    public function participer()
    {
        $user_id = Auth::user()->id;
        $users_tickets_recompenses = $this->users_service->getGainsUser($user_id);
        $nb_gains = $this->users_service->getNbGainsUser($user_id);
        $nb_gainsActive = $this->users_service->getNbGainsActiveUser($user_id);
        $nb_gainsRecuperer = $this->users_service->getNbGainsRecupererUser($user_id);
        $gagnant = $this->users_service->getGagnant();
        return view('user.participer')->with('nb_gains', $nb_gains)
                                      ->with('nb_gainsActive', $nb_gainsActive)
                                      ->with('nb_gainsRecuperer', $nb_gainsRecuperer)
                                      ->with('gagnant', $gagnant);
    }

    public function gagner(CodeRequest $request)
    {     
        try {
            $numero_ticket = Input::get('numero_ticket');
            $state_ticket = $this->users_service->getAllTickets($numero_ticket);
            //dd($state_ticket);

            if ($state_ticket) {
                return view('user.recompense')->with('user_ticket_recompense', $state_ticket);
            } else {
                return redirect()->back()->with("activated", "Ce ticket n'existe pas ou a déjà été utilisé");
            }
        } catch (Exception $e) {
            Bugsnag::notifyException($e);
            return redirect()->back()->with("activated", "L'action n'a pas pu être effectuée.");
        }
    }

    public function recompense()
    {
        return view('user.recompense');
    }

    public function gains()
    {
        $user_id = Auth::user()->id;
        $users_tickets_recompenses = $this->users_service->getGainsUser($user_id);
        return view('user.gains',['users_tickets_recompenses' => $users_tickets_recompenses]);
    }


    //Méthodes de la caissiere
    public function dashboardCaissiere()
    {
        //$tickets = $this->users_service->getAllGains();
        $ticketsNonUtilisees = null;
        $ticketsUtilisees = null;
        return view('caissiere.dashboard')->with('ticketsNonUtilisees', $ticketsNonUtilisees)
                                          ->with('ticketsUtilisees', $ticketsUtilisees);
    }

    public function searchTickets(SearchTicketsRequest $request)
    {
        try {
            if($request->numero_ticket == null && $request->email == null){
                $ticketsNonUtilisees = null;
                $ticketsUtilisees = null;
                return view('caissiere.dashboard')->with('ticketsNonUtilisees', $ticketsNonUtilisees)
                                                  ->with('ticketsUtilisees', $ticketsUtilisees);
            }
            if($request->numero_ticket != null || $request->email != null){
                $ticketsNonUtilisees = DB::table('tickets')
                    ->leftJoin('recompenses', 'tickets.recompense_id', '=', 'recompenses.id')
                    ->select('tickets.*','recompenses.*')
                    ->where('status', '=', 0)
                    ->where('numero_ticket', '=', $request->numero_ticket)
                    ->get();
                $ticketsUtilisees = DB::table('users_tickets_recompenses')
                    ->leftJoin('users', 'users_tickets_recompenses.user_id', '=', 'users.id')
                    ->leftJoin('recompenses', 'users_tickets_recompenses.recompense_id', '=', 'recompenses.id')
                    ->leftJoin('tickets', 'users_tickets_recompenses.ticket_id', '=', 'tickets.id')
                    ->select('users.*', 'tickets.*','recompenses.*', 'users_tickets_recompenses.*')
                    ->where('tickets.status', '>=', 1)
                    ->where('users.email', '=', $request->email)
                    ->orWhere('tickets.numero_ticket', '=', $request->numero_ticket)
                    ->orderByDesc('users_tickets_recompenses.id')
                    ->paginate(8);
                return view('caissiere.dashboard')->with('ticketsUtilisees', $ticketsUtilisees)
                                                  ->with('ticketsNonUtilisees', $ticketsNonUtilisees);
            }

            // if($request->email != null || $request->numero_ticket != null){
            //     $tickets = DB::table('users_tickets_recompenses')
            //     ->leftJoin('users', 'users_tickets_recompenses.user_id', '=', 'users.id')
            //     ->leftJoin('recompenses', 'users_tickets_recompenses.recompense_id', '=', 'recompenses.id')
            //     ->leftJoin('tickets', 'users_tickets_recompenses.ticket_id', '=', 'tickets.id')
            //     ->select('users.*', 'tickets.*','recompenses.*', 'users_tickets_recompenses.*')
            //     ->where('tickets.status', '>=', 1)
            //     ->where('users.email', '=', $request->email)
            //     ->where('tickets.numero_ticket', '=', $request->numero_ticket)
            //     ->orderByDesc('users_tickets_recompenses.id')
            //     ->paginate(8);
            //     return view('caissiere.dashboard')->with('ticket', $ticket);
            // }
            // $tickets = DB::table('users_tickets_recompenses')
            //     ->leftJoin('users', 'users_tickets_recompenses.user_id', '=', 'users.id')
            //     ->leftJoin('recompenses', 'users_tickets_recompenses.recompense_id', '=', 'recompenses.id')
            //     ->leftJoin('tickets', 'users_tickets_recompenses.ticket_id', '=', 'tickets.id')
            //     ->select('users.*', 'tickets.*','recompenses.*', 'users_tickets_recompenses.*')
            //     ->where('tickets.status', '>=', 1)
            //     ->orderByDesc('users_tickets_recompenses.id')
            //     ->paginate(8);
            // foreach($tickets as $ticket){
            //     if($request->numero_ticket == $ticket->numero_ticket){
            //         return view('caissiere.dashboard')->with('ticket', $ticket);
            //     }
            //     if($request->email == $ticket->email){
            //         return view('caissiere.dashboard')->with('ticket', $ticket);
            //     }
            // }
            // $ticket = null;
            // return view('caissiere.dashboard')->with('ticket', $ticket);
        } catch(Exception $e){
            Bugsnag::notifyException($e);
            redirect()->back()->with('error', 'Aucuns tickets trouvés');
        }
    }

    public function generateTicketCaisse()
    {
        $ticketsNonUtilisees = DB::table('tickets')
            ->leftJoin('recompenses', 'tickets.recompense_id', '=', 'recompenses.id')
            ->select('tickets.*','recompenses.*')
            ->where('status', 0)
            ->inRandomOrder()
            ->limit(1)
            ->get();
        foreach($ticketsNonUtilisees as $ticket){
            return $ticket->numero_ticket;
        }
    }

    public function listMessagesCaissiere()
    {
        $messagesRecus = $this->users_service->getMessagesRecus();
        $messagesEnvoyes = $this->users_service->getMessagesEnvoyesByCaissiere();     
        return view('caissiere.listMessages')->with('messagesRecus', $messagesRecus)
                                                      ->with('messagesEnvoyes', $messagesEnvoyes);
    }
    

    public function listeUtilisateursCaissiere(){
        $users = $this->users_service->getAllUsers();
        return view('caissiere.utilisateurs')->with('users', $users);
    }

    public function recompenseRecupererCaissiere($id){
        $this->users_service->recupererGain($id);
        return redirect()->back();
    }

    public function gainsUser($id)
    {
        $users_tickets_recompenses = $this->users_service->getGainsUser($id);
        return view('caissiere.gainsUser')->with('users_tickets_recompenses', $users_tickets_recompenses);
    }
    public function contactPageCaissiere()
    {
        $user = User::where('id', '=', Auth::user()->id);
        return view('caissiere.contact')->with('user', $user);
    }

    public function dashboardManager()
    {
        $tickets = Ticket::all();
        $total_tickets = count($tickets);

        $tickets_active = Ticket::where('status', '=', 1)->get();
        $total_tickets_active = count($tickets_active);

        $tickets_recupere = Ticket::where('status', '=', 2)->get();
        $total_tickets_recupere = count($tickets_recupere);

        $entreeOuDessertAuChoix_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 1)->get();
        $nombreEntreeOuDessertAuChoix_recupere = count($entreeOuDessertAuChoix_recupere);

        $burgerAuChoix_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 2)->get();
        $nombreBurgerAuChoix_recupere = count($burgerAuChoix_recupere);

        $menuDuJour_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 3)->get();
        $nombreMenuDuJour_recupere = count($menuDuJour_recupere);

        $menuAuChoix_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 4)->get();
        $nombreMenuAuChoix_recupere = count($menuAuChoix_recupere);

        $reduction_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 5)->get();
        $nombreReduction_recupere = count($reduction_recupere);

        $nombre_tickets_restants = $total_tickets - $total_tickets_recupere;

        return view('manager.dashboard')->with('total_tickets', $total_tickets)
                                        ->with('nombre_tickets_restants', $nombre_tickets_restants)
                                        ->with('total_tickets_active', $total_tickets_active)
                                        ->with('total_tickets_recupere', $total_tickets_recupere)
                                        ->with('nombreEntreeOuDessertAuChoix_recupere', $nombreEntreeOuDessertAuChoix_recupere)
                                        ->with('nombreBurgerAuChoix_recupere', $nombreBurgerAuChoix_recupere)
                                        ->with('nombreMenuDuJour_recupere', $nombreMenuDuJour_recupere)
                                        ->with('nombreMenuAuChoix_recupere', $nombreMenuAuChoix_recupere)
                                        ->with('nombreReduction_recupere', $nombreReduction_recupere);
    }

    public function statistiqueRecompensesInitiales()
    {
        $tickets = Ticket::all();
        $tickets60PourCent = Ticket::where('recompense_id', '=', 1)->get();
        $tickets60PourCent = count($tickets60PourCent);
        $tickets20PourCent = Ticket::where('recompense_id', '=', 2)->get();
        $tickets20PourCent = count($tickets20PourCent);
        $tickets10PourCent = Ticket::where('recompense_id', '=', 3)->get();
        $tickets10PourCent = count($tickets10PourCent);
        $tickets6PourCent = Ticket::where('recompense_id', '=', 4)->get();
        $tickets6PourCent = count($tickets6PourCent);
        $tickets4PourCent = Ticket::where('recompense_id', '=', 5)->get();
        $tickets4PourCent = count($tickets4PourCent);

        return view('manager.recompensesInitial')->with('tickets', $tickets)
                                        ->with('tickets60PourCent', $tickets60PourCent)
                                        ->with('tickets20PourCent', $tickets20PourCent)
                                        ->with('tickets10PourCent', $tickets10PourCent)
                                        ->with('tickets6PourCent', $tickets6PourCent)
                                        ->with('tickets4PourCent', $tickets4PourCent);
    }

    public function listMessagesManager(){
        $messagesRecus = $this->users_service->getMessagesRecus();
        $messagesEnvoyes = $this->users_service->getMessagesEnvoyesByManager(); 

        return view('manager.listMessages')->with('messagesRecus', $messagesRecus)
                                                      ->with('messagesEnvoyes', $messagesEnvoyes);
    }

    public function statistiqueParticipants()
    {
        $this->users_service->getAllGains();
        $total_tickets = $this->users_service->getNbTotalGains();
        $this->users_service->getAllTicketsActive();
        $total_tickets_active = $this->users_service->getNbTotalTicketsActive();
        $this->users_service->getAllTicketsRecupere();
        $total_tickets_recupere = $this->users_service->getNbTotalTicketsRecupere();
        $this->users_service->getAllEntreeOrDessertRecupere();
        $nombreEntreeOuDessertAuChoix_recupere = $this->users_service->getNbTotalEntreeOrDessertRecupere();
        $this->users_service->getAllBurgerAuChoixRecupere();
        $nombreBurgerAuChoix_recupere = $this->users_service->getNbTotalBurgerAuChoixRecupere();
        $this->users_service->getAllMenuDuJourRecupere();
        $nombreMenuDuJour_recupere = $this->users_service->getNbTotalMenuDuJourRecupere();
        $this->users_service->getAllMenuAuChoixRecupere();
        $nombreMenuAuChoix_recupere = $this->users_service->getNbTotalMenuAuChoixRecupere();
        $this->users_service->getAllReductionRecupere();
        $nombreReduction_recupere = $this->users_service->getNbTotalReductionRecupere();
        $nombre_tickets_restants = $this->users_service->getNbTotalTicketsRestants();

        return view('manager.statistiqueParticipants')->with('total_tickets', $total_tickets)
                                                      ->with('nombre_tickets_restants', $nombre_tickets_restants)
                                                      ->with('total_tickets_active', $total_tickets_active)
                                                      ->with('total_tickets_recupere', $total_tickets_recupere)
                                                      ->with('nombreEntreeOuDessertAuChoix_recupere', $nombreEntreeOuDessertAuChoix_recupere)
                                                      ->with('nombreBurgerAuChoix_recupere', $nombreBurgerAuChoix_recupere)
                                                      ->with('nombreMenuDuJour_recupere', $nombreMenuDuJour_recupere)
                                                      ->with('nombreMenuAuChoix_recupere', $nombreMenuAuChoix_recupere)
                                                      ->with('nombreReduction_recupere', $nombreReduction_recupere);
    }

    public function statistiqueLineManager()
    {
        $tickets = Ticket::all();
        $total_tickets = count($tickets);

        $tickets_active = Ticket::where('status', '=', 1)->get();
        $total_tickets_active = count($tickets_active);

        $tickets_recupere = Ticket::where('status', '=', 2)->get();
        $total_tickets_recupere = count($tickets_recupere);

        $entreeOuDessertAuChoix_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 1)->get();
        $nombreEntreeOuDessertAuChoix_recupere = count($entreeOuDessertAuChoix_recupere);

        $burgerAuChoix_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 2)->get();
        $nombreBurgerAuChoix_recupere = count($burgerAuChoix_recupere);

        $menuDuJour_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 3)->get();
        $nombreMenuDuJour_recupere = count($menuDuJour_recupere);

        $menuAuChoix_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 4)->get();
        $nombreMenuAuChoix_recupere = count($menuAuChoix_recupere);

        $reduction_recupere = Ticket::where('status', '=', 2)->where('recompense_id', '=', 5)->get();
        $nombreReduction_recupere = count($reduction_recupere);

        $nombre_tickets_restants = $total_tickets - $total_tickets_recupere;

        return view('manager.statistiquesLine')->with('total_tickets', $total_tickets)
                                        ->with('nombre_tickets_restants', $nombre_tickets_restants)
                                        ->with('total_tickets_active', $total_tickets_active)
                                        ->with('total_tickets_recupere', $total_tickets_recupere)
                                        ->with('nombreEntreeOuDessertAuChoix_recupere', $nombreEntreeOuDessertAuChoix_recupere)
                                        ->with('nombreBurgerAuChoix_recupere', $nombreBurgerAuChoix_recupere)
                                        ->with('nombreMenuDuJour_recupere', $nombreMenuDuJour_recupere)
                                        ->with('nombreMenuAuChoix_recupere', $nombreMenuAuChoix_recupere)
                                        ->with('nombreReduction_recupere', $nombreReduction_recupere);
    }

    public function contactPageManager()
    {
        $user = User::where('id', '=', Auth::user()->id);
        return view('manager.contact')->with('user', $user);
    }

    public function dashboardAdmin()
    {
        $ticket = null;
        $users_tickets_recompenses = $this->users_service->getAllGains();
        $gagnant = $this->users_service->getGagnant();
        return view('admin.dashboard')->with('users_tickets_recompenses', $users_tickets_recompenses)
                                      ->with('gagnant', $gagnant)
                                      ->with('ticket', $ticket);
    }

    public function grosLot()
    {
        try {
            $users_tickets_recompenses = $this->users_service->getAllGains();
            $gagnant = $this->users_service->getGrosLot($users_tickets_recompenses);
            return redirect()->back()->with("activated", "Vous avez désigné un gagnant!");
        } catch (Exception $e) {
            Bugsnag::notifyException($e);
            return redirect()->back()->with("error", "L'action n'a pas pu être effectuée.");
        }
    }

    public function listRestaurants()
    {
        $restaurants = $this->users_service->getRestaurants();
        return view('admin.listRestaurants')->with('restaurants', $restaurants);
    }

    public function listPersonnels()
    {
        $personnels = $this->users_service->getPersonnels();
        return view('admin.listPersonnels')->with('personnels', $personnels);
    }

    public function listMessagesClients()
    {
        $messagesRecus = Contact::where('role_id', '<=', 1)->orderBy('id', 'desc')->where('email_destinataire', Auth::user()->email)->get();
        $messagesEnvoyes = Contact::where('role_id', '=', 4)->orderBy('id', 'desc')->where('email_expediteur', Auth::user()->email)->get();
        return view('admin.listMessagesClients')->with('messagesRecus', $messagesRecus)
                                                ->with('messagesEnvoyes', $messagesEnvoyes);
    }

    public function listMessagesAdmin()
    {
        $messagesRecus = Contact::where('role_id', '>=', 2)->where('role_id', '<', 4)
        ->where('email_destinataire', Auth::user()->email)
        ->orderBy('id', 'desc')
        ->get();
        $messagesEnvoyes = Contact::where('role_id', '=', 4)
        ->where('email_expediteur', Auth::user()->email)
        ->orderBy('id', 'desc')
        ->get();
        return view('admin.listMessages')->with('messagesRecus', $messagesRecus)
                                                ->with('messagesEnvoyes', $messagesEnvoyes);
    }

    public function message($id)
    {
        $message = Contact::find($id);
        return view('communs.message')->with('message', $message);
    }

    public function listMessagesPersonnels()
    {
        $users = User::where('role_id', '>=', 2)->get();
        $messagesRecus = Contact::where('role_id', '>=', 2 )->orderBy('id', 'desc')->get();
        $messagesEnvoyes = Contact::where('role_id', '=', 4)->orderBy('id', 'desc')->get();
        $titreMessage = "Messages venant du personnel";
        return view('personnel.listMessages')->with('messagesRecus', $messagesRecus)
                                             ->with('messagesEnvoyes', $messagesEnvoyes)
                                             ->with('users', $users);
    }

    public function messagePersonnel($id)
    {
        $message = Contact::find($id);
        return view('admin.message')->with('message', $message);
    }

    public function listeUtilisateursAdmin()
    {
        $users = $this->users_service->getAllUsers();
        return view('admin.utilisateurs')->with('users', $users);
    }

    public function exportsUtilisateursNewsletters()
    {
        return Excel::download(new UsersExport, 'users.csv');
    }

    public function voirGagnant()
    {
        $gagnants = DB::table('users_tickets_recompenses')
                ->leftJoin('users', 'users_tickets_recompenses.user_id', '=', 'users.id')
                ->leftJoin('recompenses', 'users_tickets_recompenses.recompense_id', '=', 'recompenses.id')
                ->leftJoin('tickets', 'users_tickets_recompenses.ticket_id', '=', 'tickets.id')
                ->select('users.*', 'tickets.*','recompenses.*', 'users_tickets_recompenses.*')
                ->where('users_tickets_recompenses.groslot', '=', 1)
                ->get();
        foreach($gagnants as $gagnant){
            return view('user.gagnant')->with('gagnant', $gagnant);
        }
    }
}
