<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

use App\Models\Poste;

class PosteController extends Controller
{
    public function create()
    {
        return view('poste.create');
    }
    public function store(PostRequest $request, Poste $poste)
    {
        try {
            $poste->poste = $request->poste;

            // dd($request);

            $poste->save();

            toastr()->success('Le poste a été enregistré');

            return redirect()->back();
            // return redirect()->back()->with('success','Le poste a été enregistré');

        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function liste()
    {
        $poste = Poste::all();

        return view('poste.liste', compact('poste'));

    }
    public function editer($poste)
    {
        $poste = Poste::findOrFail($poste);

        return view('poste.edit', compact('poste'));
    }
    public function update(PostRequest $request, $poste)
    {
        try {
            $poste = Poste::findOrFail($poste);

            $poste->poste = $request->poste;

            $poste->update();

            toastr()->success('Le poste est mise à jour');

            return redirect()->route('poste.liste');
        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de la mise à jour", 1);

        }
    }
    public function delete($poste)
    {
        $poste = Poste::findOrFail($poste);

        $poste->delete();

        toastr()->success('Le poste a été enlevé avec succes');

        return redirect()->back()->with('success');
    }
}
