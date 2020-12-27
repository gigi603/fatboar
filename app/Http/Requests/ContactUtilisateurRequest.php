<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUtilisateurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email_destinataire' => 'required|email|min:5|max:50',
            'sujet' => 'required|min:5|max:50|regex:/^[a-zA-Z\s\-\'\p{L}]+$/u',
            'message' => 'required|min:20|max:1000|regex:/^[0-9\pL\s\'\-\()\.\,\@\?\!\;\^\"\:\p{L}]+$/u',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email_destinataire.required' => "Veuillez saisir votre email dexpiditeur",
            'email_destinataire.min' => 'Votre email dexpiditeur doit contenir minimum 5 caractères',
            'email_destinataire.max' => 'Votre email dexpiditeur ne doit pas dépasser 50 caractères',
            'email_destinataire.email' => "L'email du destinataire est invalide",
            'sujet.required' => 'Veuillez saisir votre sujet',
            'sujet.min' => 'Votre sujet doit contenir minimum 5 caractères',
            'sujet.max' => 'Votre sujet ne doit pas dépasser 50 caractères',
            'sujet.regex' => 'Votre sujet doit contenir que des lettres, les tirets sont autorisés',
            'message.required' => 'Veuillez saisir votre message',
            'message.min' => 'Votre message doit contenir minimum 20 caractères',
            'message.max' => 'Votre message ne doit pas dépasser 1000 caractères',
            'message.regex' => 'Votre message peuvent contenir les caractères spéciaux suivants: les ponctuations, apostrophes, accents, parenthèses, tirets et arobases'
        ];
    }

    
}