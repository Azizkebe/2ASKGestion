<?php

namespace App\Http\Controllers\Vehicule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\VoitureRequest;
use App\Models\Voiture;
use App\Models\RoleModel;
use App\Models\Employe;
use App\Models\User;

class VoitureController extends Controller
{
    public function liste()
    {
        $voiture = Voiture::all();
        return view('voiture.liste', compact('voiture'));
    }
    public function add()
    {
        return view('voiture.add');
    }
    public function store(VoitureRequest $request, Voiture $voiture)
    {
        $voiture->marque = $request->marque;
        $voiture->matricule = $request->matricule;

        $voiture->save();

        toastr()->success('La voiture est enregistrée avec succes');

        return redirect()->route('voiture.liste');
    }
    public function edit(int $vehicule)
    {
        $voiture = Voiture::findOrFail($vehicule);
        return view('voiture.edit',compact('voiture'));
    }
    public function update(int $vehicule, Request $request)
    {
       try {
        $voiture = Voiture::findOrFail($vehicule);

        $voiture->marque = $request->marque;
        $voiture->matricule = $request->matricule;

        $voiture->save();

        toastr()->success('Les informations ont été bien modifiées');

        return redirect()->route('voiture.liste');

       }
       catch (Exception $e) {
            throw new Exception("Erreur survenue lors de la modification", 1);

       }

    }

    public function delete(int $vehicule)
    {
        try {
            $voiture = Voiture::findOrFail($vehicule);

            $voiture->delete();

            toastr()->success('Bravo, La voiture a été retirée avec succes');
            return redirect()->back();

        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de la suppression ", 1);

        }
    }

    public function liste_chauffeur()
    {
        $role_resp = RoleModel::where('name','Chauffeur')->get();

        $role_resp = RoleModel::where('name','Chauffeur')->first();
        $user = User::where('role_id', $role_resp->id)->get();

        return view('voiture.chauffeur.liste', compact('user'));
    }

}
