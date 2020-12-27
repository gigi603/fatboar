<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class RegisterRequest extends FormRequest
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
            "nom" => "required|regex:/^[\pL\s\-]+$/u|min:2|max:30",
            "prenom" => "required|regex:/^[\pL\s\-]+$/u|min:2|max:30",
            "email" => "required|email|max:50|unique:users",
            "telephone" => "required|numeric|digits:10|unique:users|regex:/^[0][0-9]{9}/",
            "date_naissance" => "required|date_format:d/m/Y|after:1970-01-01",
            "password" => "required|min:8|max:20|required_with:password_confirmation|same:password_confirmation",
            "majeur" => "accepted",
            "newsletter" => "accepted",
            "cgu" => "accepted",
            'g-recaptcha-response' => 'required|captcha'
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
            'nom.required' => 'Veuillez saisir votre nom',
            'nom.regex' => 'Votre nom doit contenir uniquement des lettres. Les tirets et les espaces sont autorisés',
            'nom.min' => 'Votre nom doit contenir au moins 2 caractères',
            'nom.max' => 'Votre nom doit contenir au maximum 30 caractères',
            'prenom.required' => 'Veuillez saisir votre prénom',
            'prenom.regex' => 'Votre prénom doit contenir uniquement des lettres. Les tirets et les espaces sont autorisés',
            'prenom.min' => 'Votre prénom peut contenir minimum 2 caractères',
            'prenom.max' => 'Votre prénom peut contenir maximum 50 caractères',
            'email.required' => 'Veuillez saisir votre email',
            'email.email' => "Votre email n'est pas valide",
            'email.max' => "Veuillez saisir un email ne dépassant pas 50 caractères",
            'email.unique' => "Cette adresse figure déjà dans notre base veuillez en saisir une autre",
            'telephone.required' => "Veuillez saisir votre numéro de téléphone",
            'telephone.numeric' => "Votre numéro de telephone doit contenir uniquement des chiffres",
            'telephone.digits' => "Votre numéro de téléphone ne doit contenir que 10 chiffres",
            'telephone.regex' => "Votre numéro de telephone doit commencer par un 0",
            'telephone.unique' => "Ce numéro de téléphone figure déjà dans notre base veuillez en saisir un autre",
            'date_naissance.required' => "Veuillez saisir votre date de naissance",
            'date_naissance.date_format' => "Votre date de naissance n'est pas au bon format",
            'date_naissance.after' => "La date la plus ancienne que vous pouvez mettre est 01/01/1970",
            'password.required' => "Veuillez saisir un mot de passe",
            'password.min' => "Votre mot de passe doit contenir au moins 8 caractères",
            'password.max' => "Votre mot de passe doit contenir au maximum 20 caractères",
            'password.same' => "Veuillez confirmer votre mot de passe en saisissant le même mot de passe",
            'majeur.accepted' => "Veuillez certifier que vous avez 18 ans ou que vous avez l'autorisation de vos parents",
            'newsletter.accepted' => "Veuillez accepter le newsletter",
            'cgu.accepted' => "Veuillez accepter les conditions générales",
            'g-recaptcha-response.required' => "Veuillez cocher le captcha",
            'g-recaptcha-response.captcha' => "Veuillez cocher le captcha"
        ];
    }
}
