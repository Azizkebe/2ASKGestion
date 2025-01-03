<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoitureRequest extends FormRequest
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
            'marque'=>'required',
            'matricule'=>'required',
            'id_type_vehicule'=>'required',
        ];
    }
    public function messages(): array{

        return [
            'marque.required'=>'la marque est requise',
            'matricule.required'=>'le matricule est requis',
            'id_type_vehicule.required'=>'le choix du type de vehicule est obligatoire',
        ];
    }
}
