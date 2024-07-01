<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatrimonialRequest extends FormRequest
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
            'matrimonial'=>'required|unique:matrimonials,situation_matrimoniale'
        ];
    }
    public function messages():array
    {
        return [
            'matrimonial.required'=>'La situation matrimoniale est obligatore',
            'matrimonial.unique'=>'Le matrimonial existe déjà',
        ];
    }
}
