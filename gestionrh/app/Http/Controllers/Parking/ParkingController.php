<?php

namespace App\Http\Controllers\Parking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ParkingEditRequest;
use App\Models\Parking;
use App\Models\RoleModel;
use App\Models\User;
use App\Models\EtatValidVehicule;
use App\Models\Voiture;
use App\Models\PermissionRoleModel;
use App\Http\Requests\ParkRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailToAfterDemandeVehiculeNotification;
use App\Notifications\SendEmailToCloseDemandeVehiculeNotification;
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

        $parking = Parking::where('id_validateur',Auth::user()->employe->id)->get();
        $valid_park = PermissionRoleModel::getPermission('Chef Parking', Auth::user()->role_id);

        return view('parking.validation', compact('parking','valid_park'));
    }
    public function edit_valid(Request $request)
    {
        $parking = Parking::where('id', $request->id)->get();
        return response()->json(['parking'=>$parking]);
    }
    public function update_valid_metrage(Request $request)
    {
        $park = Parking::find($request->id);


        if($park->metrage_retour != NULL )
        {
            return toastr()->error('Desolé, Vous avez déjà ajouter le metrage');
            return response()->json(['success'=>true,'msg'=>'Desolé, Vous avez déjà ajouter le metrage']);
            return redirect()->back();
        }
        else {
            $park->metrage_retour = $request->metrage_retour;
            $reponse = $park->save();

            if($response)
            {
                    return toastr()->success('Bravo, Vous avez ajouté le metrage de retour');
                    return response()->json(['success'=>true,'msg'=>'Bravo, Vous avez ajouté le metrage de retour']);
                    return redirect()->route('parking.validation');
            }
            else
            {
                    return toastr()->error('Desolé, Impossible de faire le metrage');
                    return redirect()->back();
            }

        }
    }

    public function edit(Request $request, int $parking)
    {
        $parking = Parking::findOrFail($parking);

        $etat = EtatValidVehicule::all();

        $voiture = Voiture::where('active','1')->get();

        $role_resp = RoleModel::where('name','Chauffeur')->get();
        $role_resp = RoleModel::where('name','Chauffeur')->first();
        $user = User::with('employe')->where('role_id', $role_resp->id)->get();


        return view('parking.edit', compact('parking','etat','voiture','user'));
    }
    public function update(ParkingEditRequest $request, int $parking)
    {
        try {
            $park = Parking::find($parking);

            $role_resp = RoleModel::where('name','Comptable Matieres')->first();
            $users_resp = User::where('role_id',$role_resp->id)->first();

            $park->id_statut_validateur = $request->id_statut;
            $park->id_vehicule = $request->id_vehicule;
            $park->id_chauffeur = $request->id_chauffeur;
            $park->commentaire = $request->commentaire;

            $reussi = $park->save();
            if($reussi){

                $park->update(['active'=>'1','id_user_comptable'=>$users_resp->id_employe,'metrage_depart'=>$request->metrage_depart]);
                $messages['prenom'] = $park->user->employe->prenom;
                $messages['nom'] = $park->user->employe->nom;

                Notification::route('mail',$park->user->employe->email)->notify(
                    new SendEmailToCloseDemandeVehiculeNotification($messages)
                );
                toastr()->success('Bravo, Vous avez bien repondu à la demande de vehicule');
                return redirect()->route('parking.validation');
            }

        } catch (Exception $e) {
                throw new Exception("Erreur survenue lors de la modification", 1);

        }

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
    public function store_vehicule(Request $request)
    {
        $park = Parking::findOrFail($request->id);
        $park->id_statut_validateur = $request->statut_id;
        $park->id_vehicule = $request->vehicule_id;
        $park->id_chauffeur = $request->chauffeur_id;

        if($park->id_statut_validateur == '1')
        {
            $park->save();
            return toastr()->success('La modification a été effectuée avec success');
            return response()->json(['success'=>true,'msg'=>$request]);
            return redirect()->route('parking.liste');
        }
        else
        {
            toastr()->error('Erreur, Vous avez déjà repondu à la demande');
            return redirect()->route('parking.liste');
        }
    }
    public function demande_carburant(int $park)
    {
        $parking = Parking::findOrFail($park);

        return view('parking.demande_carburant', compact('parking'));
    }
    public function carburant_update(Request $request, int $park)
    {
        $parking = Parking::findOrFail($park);

        $role_resp = RoleModel::where('name','Comptable Matieres')->first();
        $users_comptable = User::where('role_id', $role_resp->id)->first();

        $parking->id_user_comptable = $users_comptable->id_employe;
        $parking->commentaire = $request->commentaire;

        if($parking->active == false)
        {
            $parking->active = true;
            $confirm = $parking->save();
            if($confirm)
            {
                toastr()->success('Bravo, la demande est transmise avec succes');
                return redirect()->route('parking.validation');
            }
        }
        else
        {
            toastr()->error('Erreur, cette demande a été déjà envoyée');
            return redirect()->back();
        }
    }
    public function validation_accepted()
    {
        // dd(Auth::user()->employe->id);
        $parking = Parking::where('active','1')
                            ->Where('id_user_comptable', Auth::user()->employe->id)
                            ->get();
        return view('parking.demande_accepted', compact('parking'));
    }

}
