<?php

namespace App\Http\Controllers\Parking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parking;
use App\Models\RoleModel;
use App\Models\User;
use App\Models\EtatValidVehicule;
use App\Models\Voiture;
use App\Http\Requests\ParkRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailToAfterDemandeVehiculeNotification;
use Auth;

class ParkingController extends Controller
{
    public function index()
    {

        $parking = Parking::where('id_user', Auth::user()->id)->get();

        return view('parking.index',[
            'parking'=>$parking,
        ]);
    }
    public function add()
    {
        return view('parking.add');
    }
    public function store(ParkRequest $request, Parking $park)
    {
        try {

            $role_resp = RoleModel::where('name','Chef Parking')->first();
            $users_resp = User::where('role_id',$role_resp->id)->first();

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

            $park->cloud_file_demande_vehicule = $filePath;


            $reussi = $park->save();

            if($reussi)
            {
                $park->update(['id_validateur'=>$users_resp->employe->id,'id_statut_validateur'=> '1']);

                $messages_resp['prenom'] = $users_resp->employe->prenom;
                $messages_resp['nom'] = $users_resp->employe->nom;

                Notification::route('mail',$users_resp->email)->notify(
                    new SendEmailToAfterDemandeVehiculeNotification($messages_resp)
                );

                toastr()->success('la demande est envoyée pour validation avec succes');
                return redirect()->back();

            }


        }
        catch (Exception $e) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function validation()
    {
        // $role_resp = RoleModel::where('name','Chef Parking')->first();
        // $users_resp = User::where('role_id',$role_resp->id)->first();
        // dd(Auth::user()->employe->id);
        $parking = Parking::where('id_validateur',Auth::user()->employe->id)->get();

        return view('parking.validation', compact('parking'));
    }
    public function edit(Request $request, int $parking)
    {
        $parking = Parking::findOrFail($parking);
        return view('parking.edit', compact('parking'));
    }
    public function edit_validation(Request $request)
    {
        $parking = Parking::where('id', $request->id)->get();
        $etat = EtatValidVehicule::all();
        $voiture = Voiture::where('active','1')->get();

        $role_resp = RoleModel::where('name','Chauffeur')->get();
        $role_resp = RoleModel::where('name','Chauffeur')->first();
        $user = User::with('employe')->where('role_id', $role_resp->id)->get();

        return response()->json(['etat'=>$etat,'parking'=>$parking,'user'=>$user,'voiture'=>$voiture]);
    }
    public function store_vehicule(Request $request, Parking $park)
    {
        dd($request->id);
    }
    // public function save(ParkRequest $request, Parking $park)
    // {
    //     try {
    //         $role_resp = RoleModel::where('name','Chef Parking')->first();
    //         $users_resp = User::where('role_id',$role_resp->id)->first();

    //         $request->validate([
    //             'piece_vehicule' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
    //         ]);

    //         $fileName = $request->file('piece_vehicule')->getClientOriginalName();

    //         $filePath = $request->file('piece_vehicule')->storeAs('CloudPieceDemande/Vehicule',$fileName,'public');

    //         $user = Auth::user();
    //         $user_id = $user->id;

    //         $park->motif = $request->motif;
    //         $park->id_user = $user_id;
    //         $park->destination = $request->destination;
    //         $park->date_depart = $request->date_depart;
    //         $park->heure_depart = $request->time_depart;
    //         $park->date_retour = $request->date_retour;
    //         $park->heure_retour = $request->time_retour;
    //         $park->nombre_vehicule = $request->nombre_vehicule;
    //         $park->nombre_personne = $request->nombre_personne;
    //         $park->cadre = $request->cadre;

    //         $park->cloud_file_demande_vehicule = $filePath;


    //         $park->save();
    //         toastr()->success('la demande est enregistrée avec succes');
    //         return redirect()->back();

    //     }
    //     catch (Exception $e) {
    //         throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

    //     }
    // }


}
