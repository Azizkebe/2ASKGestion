<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeMembreRequest extends FormRequest
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
            'type_membre'=>'required|unique:type_membres,type_membre',
        ];
    }
    public function messages(): array
    {
        return [
            'type_membre.required'=>'Vous devez saisir le type de membre',
        ];
    }
}
