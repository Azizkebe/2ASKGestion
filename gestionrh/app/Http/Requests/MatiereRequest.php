<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatiereRequest extends FormRequest
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
            'nature'=>'required|unique:matieres,nature',

        ];
    }
    public function messages():array{

        return [
            'nature.required'=>'la nature de la matiere est obligatoire',
            'nature.unique'=>'la nature de la matiere est existe dejà',
        ];
    }
}
