<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FournisseurRequest extends FormRequest
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
            'name_fournisseur'=>'required|unique:fournisseurs,name_fournisseur',
            'telephone'=>'required|unique:fournisseurs,telephone',


        ];
    }
    public function messages(): array{
        return [
            'name_fournisseur.required'=>'le nom du fournisseur est obligatoire',
            'name_fournisseur.unique'=>'le nom du fournisseur existe déjà',
            'telephone.unique'=>'le numero de telephone est déjà utilisé',
            'telephone.required'=>'le numero de telephone du fournisseur est obligatoire',


        ];
    }
}
