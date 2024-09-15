<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRoleRequest extends FormRequest
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
            'nom'=>'required|unique:permission_models,name',
            'groupby'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'nom.required'=>'Le nom de la permission est obligatore',
            'nom.unique'=>'Le nom existe déjà',
            'groupby.required'=>'Le numero du groupe est obligatore',


        ];
    }
}
