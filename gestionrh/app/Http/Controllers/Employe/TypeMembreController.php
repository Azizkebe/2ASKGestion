<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TypeMembreRequest;
use App\Models\TypeMembre;

class TypeMembreController extends Controller
{
    public function create()
    {
        return view('typemembre.create');
    }
    public function store(TypeMembreRequest $request, TypeMembre $type)
    {
        try {

            $type->type_membre = $request->type_membre;

            $type->save();

            toastr()->success('Le type de membre a été enregistré');

            return redirect()->back();

        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function liste()
    {
        $type = TypeMembre::all();

        return view('typemembre.liste', compact('type'));

    }
    public function editer($typemembre)
    {
        $type = TypeMembre::findOrFail($typemembre);

        return view('typemembre.edit', compact('type'));
    }
    public function update(TypeMembreRequest $request, $typemembre)
    {
        try {
            $type = TypeMembre::findOrFail($typemembre);

            $type->type_membre = $request->type_membre;

            $type->update();

            toastr()->success('Le type de membre est mise à jour');

            return redirect()->route('typemembre.liste');
        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de la mise à jour", 1);

        }
    }
    public function delete($typemembre)
    {
        $type = TypeMembre::findOrFail($typemembre);

        $type->delete();

        toastr()->success('Le type a été retiré avec succes');

        return redirect()->back();
    }
}
