<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParamTypeCongeRequest extends FormRequest
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
            'type_de_conge'=>'required|unique:param_type_conges,type_de_conge',
            'nombre_de_jour_reserve'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'type_de_conge.required'=>'Le type de congé est obligatoire',
            'type_de_conge.unique'=>'Le type de congé existe déjà',
            'nombre_de_jour_reserve.required'=>'Le nombre de jour est requis',
        ];
    }
}
