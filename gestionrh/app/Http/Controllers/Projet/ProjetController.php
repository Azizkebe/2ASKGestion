<?php

namespace App\Http\Controllers\Projet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProjetRequest;
use App\Models\Projet;

class ProjetController extends Controller
{
    public function create()
    {
        return view('projet.create');
    }
    public function store(ProjetRequest $request, Projet $projet)
    {
        $projet->name_projet = $request->name_projet;

        $projet->save();

        toastr()->success('Bravo, le projet a été ajouté avec succes');

        return redirect()->route('projet.liste');
    }
    public function liste()
    {
        $projet = Projet::all();
        return view('projet.liste', compact('projet'));
    }
    public function editer(int $projet)
    {
        $projet = Projet::findOrFail($projet);

        return view('projet.edit', compact('projet'));
    }
    public function update(int $projet, Request $request)
    {
        $projet = Projet::findOrFail($projet);

        $projet->name_projet = $request->name_projet;

        $projet->update();

        toastr()->success('Le projet a été mise à jour');

        return redirect()->route('projet.liste');

    }
    public function delete(int $projet)
    {
        $projet = Projet::findOrFail($projet);

        $projet->delete();

        toastr()->success('Le projet a été supprimé avec succes');

        return redirect()->back();
    }
}
