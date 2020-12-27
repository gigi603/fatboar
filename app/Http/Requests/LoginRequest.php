<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            "email" => "required|email|min:5|max:50",
            "password" => "required|min:8|max:50"
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
            'email.required' => 'Veuillez saisir une adresse email',
            'email.email' => 'Veuillez saisir une adresse email valide',
            'email.min' => 'Votre adresse email peut contenir minimum 5 caractères',
            'email.max' => 'Votre adresse email peut contenir maximum 50 caractères',
            'password.required' => "Un mot de passe est requis",
            'password.min' => "Votre mot de passe doit contenir minimum 8 caractères",
            'password.max' => "Votre mot de passe doit contenir maximum 50 caractères",
        ];
    }
}
