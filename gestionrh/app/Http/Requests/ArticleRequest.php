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
            'id_group'=>'required',
            'id_projet'=>'required',
            'quantite_stock'=>'required',
            'prix_unitaire'=>'required',
            'numero_article'=>'required',
            // 'id_matiere'=>'required',
            // 'id_fournisseur'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name_article.required'=>'l\'article est requis',
            'name_article.unique'=>'l\'article existe déjà',
            'id_group.required'=>'Vous devez choisir un groupe',
            'id_projet.required'=>'Vous devez choisir un projet',
            'quantite_stock.required'=>'La quantite de stock est requise',
            'prix_unitaire.required'=>'Vous devez preciser le prix unitaire de l\'article',
            'numero_article.required'=>'le numero de l\'article est requis',
            // 'id_fournisseur.required'=>'le choix du fournisseur est requis',
            // 'id_matiere.required'=>'la matiere est requise',
        ];
    }
}
