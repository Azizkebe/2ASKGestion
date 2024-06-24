<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HandRequest extends FormRequest
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
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required|unique:email,users',
            'phone'=>'required|max:9|unique:phone,users'
        ];
    }
    public function messages(): array{
        return [
            'name.required'=>'le nom de la personne est requis',
            'surname.unique'=>'le prenom de la personne est requis',
            'email.required'=>'L\adresse email est requise',
            'email.unique'=>'L\'Email existe déjà',
            'phone.required'=>'Le numero de telephone est requis',
            'phone.max'=>'Le numero doit avoir au maximun 9 chiffres'

        ];
    }
}
