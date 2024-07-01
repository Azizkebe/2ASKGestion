<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DomaineRequest;
use App\Models\Domaine;

class DomineController extends Controller
{
    public function create()
    {
        return view('domaine.create');
    }
    public function store(DomaineRequest $request, Domaine $domaine)
    {
        try {
            $domaine->domaine_etude = $request->domaine_etude;

            // dd($request);

            $domaine->save();

            return redirect()->back()->with('success','Le domaine a été enregistré');

        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function liste()
    {
        $domaine = Domaine::all();

        return view('domaine.liste', compact('domaine'));

    }
    public function editer($domaine)
    {
        $domaine = Domaine::findOrFail($domaine);

        return view('domaine.edit', compact('domaine'));
    }
    public function update(DomaineRequest $request, $domaine)
    {
        try {
            $domaine = Domaine::findOrFail($domaine);

            $domaine->domaine_etude = $request->domaine_etude;

            $domaine->update();

            return redirect()->route('domaine.liste')->with('success', 'Le domaine est mise à jour');
        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de la mise à jour", 1);

        }
    }
    public function delete($domaine)
    {
        $domaine = Domaine::findOrFail($domaine);

        $domaine->delete();

        return redirect()->back()->with('success','Le domaine a été enlevé avec succes');
    }
}
