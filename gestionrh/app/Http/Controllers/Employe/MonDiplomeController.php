<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MonDiplomeRequest;
use App\Models\MonDiplome;

class MonDiplomeController extends Controller
{
    public function created()
    {
        return view('mondiplome.create');
    }
    public function store(MonDiplomeRequest $request, MonDiplome $diplome)
    {
        try {
            $diplome->diplome_etude = $request->diplome_etude;

            $diplome->save();

            toastr()->success('Le diplome d\'etude a été enregistré');

            return redirect()->back();

        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function liste()
    {
        $diplome = MonDiplome::all();

        return view('mondiplome.liste', compact('diplome'));

    }
    public function editer($diplome)
    {
        $diplome = MonDiplome::findOrFail($diplome);

        return view('mondiplome.edit', compact('diplome'));
    }
    public function update(MonDiplomeRequest $request, $diplome)
    {
        try {
            $diplome = MonDiplome::findOrFail($diplome);

            $diplome->diplome_etude = $request->diplome_etude;

            $diplome->update();

            toastr()->success('Le diplome d\'etude est mise à jour');

            return redirect()->route('diplome.liste');

        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de la mise à jour", 1);

        }
    }
    public function delete($diplome)
    {
        $diplome = MonDiplome::findOrFail($diplome);

        $diplome->delete();

        toastr('Le diplome d\'etude a été enlevé avec succes');

        return redirect()->back();
    }
}
