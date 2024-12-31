<?php

namespace App\Http\Controllers\Fournisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FournisseurRequest;
use App\Models\Fournisseur;
use App\Models\User;
use App\Models\PermissionRoleModel;
use Auth;

class FournisseurController extends Controller
{
    public function liste()
    {
        $autorise_edit = PermissionRoleModel::getPermission('Edit Fournisseur', Auth::user()->role_id);
        $autorise_delete = PermissionRoleModel::getPermission('Supprimer Fournisseur', Auth::user()->role_id);

        $fournisseur = Fournisseur::all();
        return view('fournisseur.liste', compact('fournisseur','autorise_edit','autorise_delete'));
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
    public function edit($fournisseur)
    {
        $fournis = Fournisseur::findOrFail($fournisseur);
        return view('fournisseur.edit', compact('fournis'));
    }
    public function update(int $fournisseur, Request $request)
    {
        try {

            $fournis = Fournisseur::findOrFail($fournisseur);

            $fournis->name_fournisseur = $request->name_fournisseur;
            $fournis->telephone = $request->telephone;
            $fournis->adresse = $request->adresse;

            $fournis->save();

            toastr()->success('Les informations du fournisseur sont mises à jour');
            return redirect()->route('fournisseur.liste');

        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de la mise à jour", 1);
        }
    }
    public function delete($fournisseur)
    {
        try {

            $fournis = Fournisseur::findOrFail($fournisseur);
            $fournis->delete();

            toastr()->success('le fournisseur a été retiré avec sucess');
            return redirect()->back();

        } catch (\Throwable $th) {
            throw new Exception("Erreur survenue lors de la suppression", 1);

        }
    }
}
