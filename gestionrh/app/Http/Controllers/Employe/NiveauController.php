<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NiveauRequest;
use App\Models\NiveauEtude;

class NiveauController extends Controller
{
    public function create()
    {
        return view('niveau.create');
    }
    public function store(NiveauRequest $request, NiveauEtude $niveau)
    {
        try {
            $niveau->niveau_etude = $request->niveau_etude;

            // dd($request);

            $niveau->save();

            return redirect()->back()->with('success','Le niveau d\'etude a été enregistré');

        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function liste()
    {
        $niveau = NiveauEtude::all();

        return view('niveau.liste', compact('niveau'));

    }
    public function editer($niveau)
    {
        $niveau = NiveauEtude::findOrFail($niveau);

        return view('niveau.edit', compact('niveau'));
    }
    public function update(NiveauRequest $request, $niveau)
    {
        try {
            $niveau = NiveauEtude::findOrFail($niveau);

            $niveau->niveau_etude = $request->niveau_etude;

            $niveau->update();

            return redirect()->route('niveau.liste')->with('success', 'Le niveau d\'etude est mise à jour');
        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de la mise à jour", 1);

        }
    }
    public function delete($niveau)
    {
        $niveau = NiveauEtude::findOrFail($niveau);

        $niveau->delete();

        return redirect()->back()->with('success','Le niveau d\'etude a été enlevé avec succes');
    }
}
