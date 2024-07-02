<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NiveauRequest extends FormRequest
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
            'niveau_etude'=>'required|unique:niveau_etudes,niveau_etude',
        ];
    }
    public function messages(): array
    {
        return [
            'niveau_etude.required'=>'Le niveau d\'etude est obligatore',
            'niveau_etude.unique'=>'Le niveau d\'etude existe déjà',
        ];
    }
}
