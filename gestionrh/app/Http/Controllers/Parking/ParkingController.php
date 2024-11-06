<?php

namespace App\Http\Controllers\Parking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parking;
use Auth;

class ParkingController extends Controller
{
    public function add()
    {
        return view('parking.add');
    }
    public function store(Request $request, Parking $park)
    {
        try {

            $request->validate([
                'piece_vehicule' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            ]);

            $fileName = $request->file('piece_vehicule')->getClientOriginalName();

            $filePath = $request->file('piece_vehicule')->storeAs('CloudPieceDemande/Vehicule',$fileName,'public');

            $user = Auth::user();
            $user_id = $user->id;

            $park->motif = $request->motif;
            $park->id_user = $user_id;
            $park->destination = $request->destination;
            $park->date_depart = $request->date_depart;
            $park->heure_depart = $request->time_depart;
            $park->date_retour = $request->date_retour;
            $park->heure_retour = $request->time_retour;
            $park->nombre_vehicule = $request->nombre_vehicule;
            $park->nombre_personne = $request->nombre_personne;
            $park->cadre = $request->cadre;
            $park->id_statut_validateur = '1';
            $park->cloud_file_demande_vehicule = $filePath;

            // dd($park);
            $park->save();


        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }

}
