<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonDiplomeRequest extends FormRequest
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
            'diplome_etude'=>'required|unique:mon_diplomes,diplome_etude',
        ];
    }
    public function messages(): array
    {
        return [
            'diplome_etude.required'=>'Le diplome d\'etude est obligatoire',
            'diplome_etude.unique'=>'Le diplome d\'etude existe déjà',
        ];
    }
}
