<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HandProfilRequest extends FormRequest
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
            'email'=> 'string|unique:users,email',
            'phone'=> 'integer|max:9|unique:users,phone',
        ];
    }
    public function messages() :array{
       return [
            'email.unique'=>'Email existe déjà',
            'email.email'=>'email n\'est pas valide',
            'phone.unique'=>'Le numero du telephone existe déjà',
            'phone.max'=>'Le telephone doit avoir un max 9 chiffres',
       ];
    }
}
