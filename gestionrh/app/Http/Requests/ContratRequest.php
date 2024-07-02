<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratRequest extends FormRequest
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
            'contrat'=>'required|unique:contrats,contrat',
        ];
    }
    public function messages(): array
    {
        return [
            'contrat.required'=>'Le contrat est obligatoire',
            'contrat.unique'=>'Le contrat existe déjà',
        ];
    }
}
