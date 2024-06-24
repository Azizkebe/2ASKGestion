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
            'email'=>'required|unique:users,email',
            'phone'=>'required|max:9|unique:users,phone',
        ];
    }
    public function messages(): array{
        return [
            'surname.required'=>'Mettez votre prenom',
            'name.required'=>'Mettez votre nom',
            'email.required'=>'Email est requis',
            'email.unique'=>'Email existe déjà',
            'email.email'=>'Veuillez fournir une addresse valide',
            'phone.required'=>'Le Telephone est requis',
            'phone.unique'=>'Le Telephone existe déjà',
            'phone.max'=>'Telephone doit etre au maximum 9 quatre chiffres',

        ];
    }
}
