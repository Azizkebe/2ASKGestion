<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FicheContratRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_employe'=>'required',
            'id_contrat'=>'required',
            'date_obtention_contrat'=>'required',
            'date_fin_contrat'=>'required',
            'commentaire'=>'required',
            'fichier_contrat'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'id_employe.required'=>'Le choix de l\'employe est obligatoire',
            'id_contrat.required'=>'Le choix du type de contrat est obligatoire',
            'date_obtention_contrat.required'=>'veuillez choisir la date de debut contrat',
            'date_fin_contrat.required'=>'veuillez choisir la date de debut fin',
            'commentaire.required'=>'Mettez une decription',
            'fichier.required'=>'Veuillez joindre une copie du contrat',
        ];
    }
}
