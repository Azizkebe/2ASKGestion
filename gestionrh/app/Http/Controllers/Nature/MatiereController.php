<?php

namespace App\Http\Controllers\Nature;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MatiereRequest;
use App\Models\Matiere;
use App\Models\User;
use App\Models\PermissionRoleModel;
use Auth;

class MatiereController extends Controller
{
    public function liste()
    {
        $autorise_edit = PermissionRoleModel::getPermission('Edit_Nature_Matiere', Auth::user()->role_id);
        $autorise_delete = PermissionRoleModel::getPermission('Supprimer_Nature_Matiere', Auth::user()->role_id);
        $matiere = Matiere::all();

        return view('matiere.liste', compact('matiere','autorise_edit','autorise_delete'));
    }
    public function create()
    {
        return view('matiere.create');
    }
    public function store(MatiereRequest $request, Matiere $matiere)
    {
        $matiere->nature = $request->nature;

        $matiere->save();

        toastr()->success('La matiere a été ajoutée avec succes');
        return redirect()->back();
    }
    public function edit($matiere)
    {
        $matiere = Matiere::findOrFail($matiere);

        return view('matiere.edit', compact('matiere'));
    }
    public function update($matiere, Request $request)
    {
        try {
                $matiere = Matiere::findOrFail($matiere);

                $matiere->nature = $request->nature;

                $matiere->save();

                toastr()->success('Bravo, la nature des matieres a été modifiée avec succes');
                return redirect()->route('matiere.liste');

        } catch (\Throwable $th) {
            throw new Exception("Error Processing Request", 1);

        }
    }
    public function delete($matiere, Request $request)
    {
        try {
            $matiere = Matiere::findOrFail($matiere);

            $matiere->delete();

            toastr()->success('La nature des matieres a été retirée avec succes');
            return redirect()->back();
        } catch (\Exception $th) {
            throw new Exception("Erreur survenue lors de la suppression", 1);

        }
    }
}
