<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CodeRequest extends FormRequest
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
            'numero_ticket' => 'required|min:10|max:10|regex:/^[0-9a-zA-Z\s\-]+$/u',
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
            'numero_ticket.required' => 'Veuillez saisir votre numéro de ticket',
            'numero_ticket.min' => 'Votre numero doit contenir contenir 10 caractères',
            'numero_ticket.max' => 'Votre numero doit contenir contenir 10 caractères',
            'numero_ticket.regex' => 'Votre numero doit contenir uniquement que des chiffres et/ou des lettres'
        ];
    }

    
}