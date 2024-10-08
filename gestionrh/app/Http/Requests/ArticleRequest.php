<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'name_article'=>'required|unique:articles,name_article',
        ];
    }
    public function messages(): array
    {
        return [
            'name_article.required'=>'l\'article est requis',
            'name_article.unique'=>'l\'article existe déjà',
        ];
    }
}
