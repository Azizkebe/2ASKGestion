<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'id_direction'=>'required',
            'service'=>'required|unique:services,service'
        ];
    }
    public function messages(): array
    {
        return [
            'id_direction.required'=>'Le choix de la direction est obligatoire',
            'service.required'=>'Le choix du service est obligatoire',
            'service.unique'=>'Le service existe déjà',
        ];
    }
}
