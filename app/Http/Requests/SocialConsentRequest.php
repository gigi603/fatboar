<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialConsentRequest extends FormRequest
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
            "majeur" => "accepted",
            "newsletter" => "accepted",
            "cgu" => "accepted",
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
            'majeur.accepted' => "Veuillez certifier que vous avez 18 ans ou avoir l'autorisation de vos parents",
            'newsletter.accepted' => "Veuillez accepter le newsletter",
            'cgu.accepted' => "Veuillez accepter les conditions générales",
        ];
    }
}
