<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FicheModifRequest extends FormRequest
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
            'piece_mission'=>'required',
            'comment'=>'required',
        ];
    }
    public function messages(): array{
        return [
            'piece_mission.required'=>'Veuillez joindre la fiche d\'ordre de mission',
            'comment.required'=>'Veuillez donner un commentaire',
        ];
    }
}
