<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContratRequest;
use App\Models\Contrat;

class TypeContratController extends Controller
{
    public function create()
    {
        return view('contrat.create');
    }
    public function store(ContratRequest $request, Contrat $contrat)
    {
        try {
            $contrat->contrat = $request->contrat;

            // dd($request);

            $contrat->save();

            return redirect()->back()->with('success','Le contrat d\'etude a été enregistré');

        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function liste()
    {
        $contrat = Contrat::all();

        return view('contrat.liste', compact('contrat'));

    }
    public function editer($contrat)
    {
        $contrat = Contrat::findOrFail($contrat);

        return view('contrat.edit', compact('contrat'));
    }
    public function update(ContratRequest $request, $contrat)
    {
        try {
            $contrat = Contrat::findOrFail($contrat);

            $contrat->contrat = $request->contrat;

            $contrat->update();

            return redirect()->route('contrat.liste')->with('success', 'Le contrat est mise à jour');
        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de la mise à jour", 1);

        }
    }
    public function delete($contrat)
    {
        $contrat = Contrat::findOrFail($contrat);

        $contrat->delete();

        return redirect()->back()->with('success','Le contrat a été enlevé avec succes');
    }
}
