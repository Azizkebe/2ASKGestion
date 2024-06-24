<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitAccessRequest extends FormRequest
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
            'password'=> 'required|same:confirm_password',
            'confirm_password'=>'required|same:password',
        ];
    }

    public function messages() :array
    {
        return [
            'password.same'=>'les mots de passe ne sont pas conforment',
            'confirm_password.same'=>'Les mots de passse ne sont pas conforment',
        ];
    }
}
