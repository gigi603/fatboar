<?php

namespace App\Repositories;
use App\Http\Requests\ContactAdminByGuestRequest;
use App\Http\Requests\ContactAdminByUtilisateurRequest;
use App\Models\Contact;

class ContactsRepository
{
    public function get()
    {
        return Contact::all();
    }

    public function send(Contact $contact)
    {
    	$ticket->status = 1;
        $ticket->user_id = $user_id;
        $ticket->save();
    }

    public function sendMailToAdminsByGuest(ContactAdminByGuestRequest $request, $admin)
    {
        $contact = new Contact;
        $contact->nom = $request->nom;
        $contact->prenom = $request->prenom;
        $contact->email_expediteur = $request->email_expediteur;
        $contact->email_destinataire = $admin->email;
        $contact->role_id = 0;
        $contact->sujet   = $request->sujet;
        $contact->message = $request->message;
        $contact->save();

        return $contact;
    }

    public function sendMailToAdminsByConnectedUsers(ContactAdminByUtilisateurRequest $request, $user, $admin)
    {
        $contact = new Contact;
        if($user->nom == "" && $user->prenom == ""){
            $contact->nom = $user->name;
        } else {
            $contact->nom = $user->nom.' '.$user->prenom;
        }
        $contact->email_expediteur = $user->email;
        $contact->email_destinataire = $admin->email;
        
        if($user->role_id == 1)
        {
            $contact->role_id = 1;

        }
        if($user->role_id == 2)
        {
            $contact->role_id = 2;

        }
        if($user->role_id == 3)
        {
            $contact->role_id = 3;

        }
        $contact->sujet   = $request->sujet;
        $contact->message = $request->message;
        $contact->save();

        return $contact;
    }
}
