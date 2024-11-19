<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MissionRequest extends FormRequest
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
            'activite'=>'required',
            'destination'=>'required',
            'date_depart'=>'required',
            'date_retour'=>'required',
            'cadre'=>'required',
            'id_type_mission'=>'required|integer',
            'id_moyen_transport'=>'required|integer',
            'piece_mission'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'activite.required'=>'Veuillez preciser l\'activite',
            'destination.required'=>'Veuillez preciser la destination',
            'date_depart.required'=>'Veuillez preciser la date de depart',
            'date_retour.required'=>'Veuillez preciser la date de retour',
            'id_type_mission.required'=>'Veuillez choisir le type de mission',
            'id_moyen_transport.required'=>'Veuillez choisir un moyen de transport',
            'piece_mission.required'=>'Vous devez joindre un justificatif',
        ];
    }
}
