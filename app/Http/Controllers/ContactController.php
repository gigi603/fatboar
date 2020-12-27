<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ContactUtilisateurRequest;
use App\Http\Requests\ContactAdminByUtilisateurRequest;
use App\Http\Requests\ContactAdminByGuestRequest;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\ContactAdmin;

use App\Services\UsersService;



class ContactController extends Controller
{

    protected $users_service;

    public function __construct(UsersService $users_service)
    {
        $this->users_service = $users_service;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\ContactRequest  $request
     * @return \Illuminate\Http\Response
     */

    // Formulaire de contact
    public function contactPage()
    {
        $user = Auth::user();
        return view('contact')->with('user', $user);
    }

    public function contactPageUtilisateur()
    {
        $user = Auth::user();
        return view('communs.contactAdmin')->with('user', $user);
    }

    public function contactPageAdmin()
    {
        $user = Auth::user();
        return view('admin.contact')->with('user', $user);
    }

    public function contactPagePersonnelAdmin()
    {
        $user = Auth::user();
        return view('admin.contactPersonnel')->with('user', $user);
    }

    // Le visiteur envoie un message à l'admin
    public function contactAdminByGuest(ContactAdminByGuestRequest $request)
    {
        $admins = User::where('role_id', '=', 4)->get();

        foreach($admins as $admin)
        {
            $contact = $this->users_service->sendMailToAdminsByGuest($request, $admin);
        }
        Mail::to('fatboar.contact@gmail.com')->send(new ContactAdmin($contact));

        return redirect()->back()->with("success_message", "Le message a bien été envoyé à notre équipe, nous vous répondrons dans les plus bref délais.
        Notre équipe vous remercie.");
    }

    //L'utilisateur contacte l'admin
    public function contacterAdmin(ContactAdminByUtilisateurRequest $request)
    {
        $user = Auth::user();
        $admins = User::where('role_id', '=', 4)->get();

        foreach($admins as $admin)
        {
            $contact = $this->users_service->sendMailToAdminsByConnectedUsers($request, $user, $admin);
        }

        Mail::to('fatboar.contact@gmail.com')->send(new ContactAdmin($contact));

        return redirect()->back()->with("success_message", "Le message a bien été envoyé aux admins");

    }

    public function contacterUtilisateur(ContactUtilisateurRequest $request)
    {
        if(Auth::user()->role_id == 4) {
            $contact = new Contact;
            $contact->nom     = Auth::user()->nom;
            $contact->prenom  = Auth::user()->prenom;
            $contact->email_expediteur   = Auth::user()->email;
            $contact->email_destinataire = $request->email_destinataire;
            $contact->role_id = Auth::user()->role_id;
            $contact->sujet   = $request->sujet;
            $contact->message = $request->message;
            $contact->save();
            Mail::to($request->email_destinataire)->send(new ContactAdmin($contact));
            return redirect()->back()->with("success_message", "Le message a bien été envoyé");
        } else {
            return redirect()->back()->with("error_message", "Le message n'a pas été envoyé");
        }
    }

    public function contacterPersonnel(ContactUtilisateurRequest $request)
    {
        if(Auth::user()->role_id == 4)
        {
            $contact = new Contact;
            $contact->nom     = Auth::user()->nom;
            $contact->prenom  = Auth::user()->prenom;
            $contact->email_expediteur   = Auth::user()->email;
            $contact->email_destinataire = $request->email_destinataire;
            $contact->role_id = Auth::user()->role_id;
            $contact->sujet   = $request->sujet;
            $contact->message = $request->message;
            $contact->save();
        }
        Mail::to($request->email_destinataire)->send(new ContactAdmin($contact));
        return redirect('/listMessages/admin')->with("success_message", "Vous avez bien envoyé le message");
    }
}
