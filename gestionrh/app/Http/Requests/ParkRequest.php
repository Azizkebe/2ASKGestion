<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParkRequest extends FormRequest
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
            'motif'=>'required',
            'destination'=>'required',
            'date_depart'=>'required',
            'date_retour'=>'required',
            'time_depart'=>'required',
            'time_retour'=>'required',
            'nombre_vehicule'=>'required',
            'nombre_personne'=>'required',
            'piece_vehicule'=>'required'
        ];
    }
    public function messages(): array
    {
        return [
            'motif.required'=>'Veuillez saisir le motif',
            'destination.required'=>'Veuillez preciser la destination',
            'date_depart.required'=>'Veuillez preciser la date de depart',
            'date_retour.required'=>'Veuillez preciser la date de retour',
            'time_depart.required'=>'Veuillez preciser l\'heure de depart',
            'time_retour.required'=>'Veuillez preciser l\'heure de retour',
            'nombre_vehicule.required'=>'Veuillez preciser le nombre de vehicule',
            'nombre_personne.required'=>'Veuillez preciser le nombre de personne',
            'piece_vehicule.required'=>'Vous devez joindre un justificatif',
        ];
    }
}
