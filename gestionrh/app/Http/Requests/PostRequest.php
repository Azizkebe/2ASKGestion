<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'poste'=>'required|unique:postes,poste',
        ];
    }
    public function messages(): array
    {
        return [
            'poste.required'=>'Veuillez saisir le poste',
            'poste.unique'=>'le poste existe déjà',
        ];
    }
}
