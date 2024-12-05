<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FournitureRequest extends FormRequest
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
            'id_projet'=>'required',
            'motif'=>'required',
            'id_group'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'id_projet.required'=>'Le choix du projet est obligatoire',
            'motif.required'=>'Le motif de la demande est obligatoire',
            'id_group.required'=>'Le choix du groupe est obligatoire',
        ];
    }
}
