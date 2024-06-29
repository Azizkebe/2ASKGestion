<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
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
            'sexe'=>'required|unique:genres,name',
        ];
    }
    public function messages(): array
    {
        return [
            'sexe.required'=>'Le genre est obligatore',
            'sexe.unique'=>'Le genre existe déjà',
        ];
    }
}
