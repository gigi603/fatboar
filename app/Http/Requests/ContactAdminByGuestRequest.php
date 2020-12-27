<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactAdminByGuestRequest extends FormRequest
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
            'nom' => 'required|min:2|max:50|regex:/^[a-zA-Z\s\-\p{L}]+$/u',
            'prenom' => 'required|min:2|max:50|regex:/^[a-zA-Z\s\-\p{L}]+$/u',
            'email_expediteur' => 'required|min:5|max:50',
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
            'nom.required' => 'Veuillez saisir un nom',
            'nom.min' => 'Votre nom peut contenir minimum 2 caractères',
            'nom.max' => 'Votre nom peut contenir maximum 50 caractères',
            'nom.regex' => 'Votre nom ne doit contenir que des lettres, les tirets sont autorisés',
            'prenom.required' => 'Veuillez saisir un prénom',
            'prenom.min' => 'Votre prénom peut contenir minimum 2 caractères',
            'prenom.max' => 'Votre prénom peut contenir maximum 50 caractères',
            'prenom.regex' => 'Votre prénom ne doit contenir que des lettres, les tirets sont autorisés',
            'email_expediteur.required' => 'Veuillez saisir votre email',
            'email_expediteur.min' => "Votre email doit contenir minimum 5 caractères",
            'email_expediteur.max' => "Votre email ne doit pas dépasser 50 caractères",
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