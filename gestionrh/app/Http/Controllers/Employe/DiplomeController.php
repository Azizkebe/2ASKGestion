<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DiplomeRequest;
use App\Models\Diplome;

class DiplomeController extends Controller
{
    public function create()
    {
        return view('diplome.create');
    }
    public function store(DiplomeRequest $request, Diplome $diplome)
    {
        try {
            $diplome->diplome_etude = $request->diplome_etude;

            // dd($request);

            $diplome->save();

            return redirect()->back()->with('success','Le diplome d\'etude a été enregistré');

        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function liste()
    {
        $diplome = Diplome::all();

        return view('diplome.liste', compact('diplome'));

    }
    public function editer($diplome)
    {
        $diplome = Diplome::findOrFail($diplome);

        return view('diplome.edit', compact('diplome'));
    }
    public function update(DiplomeRequest $request, $diplome)
    {
        try {
            $diplome = Diplome::findOrFail($diplome);

            $diplome->diplome_etude = $request->diplome_etude;

            $diplome->update();

            return redirect()->route('diplome.liste')->with('success', 'Le diplome d\'etude est mise à jour');
        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de la mise à jour", 1);

        }
    }
    public function delete($diplome)
    {
        $diplome = Diplome::findOrFail($diplome);

        $diplome->delete();

        return redirect()->back()->with('success','Le diplome d\'etude a été enlevé avec succes');
    }
}
