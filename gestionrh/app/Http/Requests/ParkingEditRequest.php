<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParkingEditRequest extends FormRequest
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
            // 'id_vehicule'=>'required',
            // 'id_chauffeur'=>'required',
            'id_statut'=>'required',
            'commentaire'=>'required',
            // 'metrage_depart'=>'required',
        ];
    }
    public function messages():array{
        return [

            // 'id_vehicule.required'=>'Vous devez choisir un vehicule',
            // 'id_chauffeur.required'=>'Veuillez choisir un chauffeur',
            'id_statut.required'=>'Veuillez changer le statut du dossier',
            'commentaire.required'=>'Vous devez motiver la decision',
            // 'metrage_depart.required'=>'Vous devez preciser le mettrage de depart'

        ];
    }
}
