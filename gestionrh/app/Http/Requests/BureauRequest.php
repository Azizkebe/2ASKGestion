<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BureauRequest extends FormRequest
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
            'id_antenne'=>'required',
            'bureau'=>'required|unique:bureaus,bureau',
        ];
    }
    public function messages(): array
    {
        return [
            'id_antenne.required'=>'Le choix de l\'antenne est obligatoire',
            'bureau.required'=>'Le choix du bureau est obligatoire',
            'bureau.unique'=>'Le bureau existe déjà',
        ];
    }
}
