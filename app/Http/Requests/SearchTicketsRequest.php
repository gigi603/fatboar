<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchTicketsRequest extends FormRequest
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
            "numero_ticket" => "required_without:email",
            "email" => "required_without:numero_ticket",
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
            'numero_ticket.required_without' => "Veuillez saisir soit votre numero de ticket ou votre adresse mail ",
            'email.required_without' => "Veuillez saisir soit votre numero de ticket ou votre adresse mail",
        ];
    }
}
