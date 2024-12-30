<?php

namespace App\Http\Controllers\Fournisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FournisseurRequest;
use App\Models\Fournisseur;

class FournisseurController extends Controller
{
    public function liste()
    {
        $fournisseur = Fournisseur::all();
        return view('fournisseur.liste', compact('fournisseur'));
    }
    public function create()
    {
        return view('fournisseur.create');
    }
    public function store(FournisseurRequest $request, Fournisseur $fournisseur)
    {
        $fournisseur->name_fournisseur = $request->name_fournisseur;
        $fournisseur->telephone = $request->telephone;
        $fournisseur->adresse = $request->adresse;

        $fournisseur->save();

        toastr()->success('Le fournisseur a été ajouté avec succes');
        return redirect()->back();

    }
}
