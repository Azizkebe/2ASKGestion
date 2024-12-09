<?php

namespace App\Http\Controllers\Fiche;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\FicheModifRequest;
use App\Notifications\SendEmailToAfterDemandeOrdreMissionNotification;
use App\Notifications\SendEmailToCloseSupDemandeOrdreMissionNotification;
use App\Notifications\SendEmailToCloseDemandeOrdreMissionNotification;
use App\Models\FicheTechnique;
use App\Models\MoyenTransport;
use App\Models\TypeMission;
use App\Models\Voiture;
use App\Models\RoleModel;
use App\Models\PermissionRoleModel;
use App\Models\StatutDemandeOMSup;
use App\Http\Requests\FicheRequest;
use App\Models\User;
use Auth;
use PDF;
class FicheTechniqueController extends Controller
{
    public function liste()
    {
        $fiche = FicheTechnique::where('id_user',Auth::user()->id)->get();
        // dd(Auth::user()->id);
        return view('fiche.liste', compact('fiche'));
    }
    public function add()
    {
        $mission = TypeMission::all();
        $moyen = MoyenTransport::all();
        return view('fiche.add',[
            'mission'=>$mission,
            'moyen'=>$moyen,
        ]);
    }
    public function store(FicheRequest $request, FicheTechnique $fiche)
    {
        try {
            $role_resp = RoleModel::where('name','Ressource Humaine')->first();
            $users_resp = User::where('role_id',$role_resp->id)->first();

            $user = Auth::user();
            $user_id = $user->id;
            $id_superieur = $user->employe->service->id_chef_service;

            $fiche->objet = $request->objet;
            $fiche->id_user = $user_id;
            $fiche->destination = $request->destination;
            $fiche->date_depart = $request->date_depart;
            $fiche->date_retour = $request->date_retour;
            $fiche->moyen_transport = $request->id_moyen_transport;
            $fiche->type_mission = $request->id_type_mission;
            $fiche->frais = $request->cadre;
            $fiche->objectif = $request->objectif;

            // $request->validate([
            //     'piece_justificative' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            // ]);

            $fileName = $request->file('piece_justificative')->getClientOriginalName();

            $filePath = $request->file('piece_justificative')->storeAs('CloudFicheTechnique/Fiche',$fileName,'public');

            $fiche->piece_justificative = $filePath;

            $reussi = $fiche->save();

            if($reussi)
            {
                // $fiche->update(['id_validateur'=>$users_resp->id_employe,'id_statut_demande_mission'=> '1']);
                $fiche->update(['id_superieur'=>$user->employe->service->id_chef_service,'id_statut_demande_OM_Sup'=> '1']);

                $messages_resp['prenom'] = $user->employe->service->employe->prenom;
                $messages_resp['nom'] = $user->employe->service->employe->nom;

                Notification::route('mail',$user->employe->service->employe->email)->notify(
                    new SendEmailToAfterDemandeOrdreMissionNotification($messages_resp)
                );

                toastr()->success('la demande d\'ordre de mission est envoyée pour traitement avec succes');
                return redirect()->route('fiche.liste');

            }
        }
        catch (Exception $e) {
            throw new Exception("Erreur survenue lors de l'enregistrement", 1);

        }
    }
    public function consulte_fiche(int $fiche_technique)
    {
        try {
            $fiche = FicheTechnique::findOrFail($fiche_technique);
        $type = TypeMission::all();
        $moyen = MoyenTransport::all();
        $voiture = Voiture::where('active','1')->get();
        return view('fiche.consult', [
            'fiche'=>$fiche,
            'type'=>$type,
            'moyen'=>$moyen,
            'voiture'=>$voiture,
        ]);
        } catch (\Throwable $th) {
            throw new Exception("Error Processing Request", 1);
        }
    }
    public function edit_valid_sup(int $fiche_technique)
    {
        $fiche = FicheTechnique::findOrFail($fiche_technique);
        $type = TypeMission::all();
        $moyen = MoyenTransport::all();
        $statutOM = StatutDemandeOMSup::all();

        return view('fiche.detail_valide_sup', [
            'fiche'=>$fiche,
            'type'=>$type,
            'moyen'=>$moyen,
            'statutOM'=>$statutOM,

        ]);

    }
    public function update_valid_sup(Request $request, int $fiche_technique)
    {
        try {
            $role_resp = RoleModel::where('name','Ressource Humaine')->first();
            $users_resp = User::where('role_id',$role_resp->id)->first();

            $fiche = FicheTechnique::findOrFail($fiche_technique);

            $fiche->id_statut_demande_OM_Sup = $request->id_statut_OM;
            // $fiche->commentaire = $request->comment;

            $reussi = $fiche->save();

            if($reussi)
            {
                $fiche->update(['id_statut_demande_OM_Sup'=>$request->id_statut_OM,'id_validateur'=>$users_resp->id_employe,'id_statut_demande_mission'=> '1']);

                $messages['prenom'] = $fiche->user->employe->prenom;
                $messages['nom'] = $fiche->user->employe->nom;

                Notification::route('mail',$fiche->user->employe->email)->notify(
                    new SendEmailToCloseSupDemandeOrdreMissionNotification($messages)
                );
                toastr()->success('Bravo, vous avez repondu à la demande');
                return redirect()->route('fiche.validation');
            }
           } catch (Exception $e) {
            throw new Exception("Error Processing Request", 1);

           }
    }
    public function validation()
    {
        // $fiche = FicheTechnique::where('id_validateur',Auth::user()->employe->id)->get();
        $Validation_OM = PermissionRoleModel::getPermission('Validation Ordre de Mission', Auth::user()->role_id);

        $fiche = FicheTechnique::where('id_superieur',Auth::user()->employe->id)
                                ->orWhere('id_validateur',Auth::user()->employe->id)->get();

        return view('fiche.validation', compact('fiche','Validation_OM'));
        // return view('fiche.validation', compact('fiche'));
    }
    public function detail_valid(int $fiche_technique)
    {
        $fiche = FicheTechnique::findOrFail($fiche_technique);
        $type = TypeMission::all();
        $moyen = MoyenTransport::all();
        $voiture = Voiture::where('active','1')->get();

        $Validation_OM = PermissionRoleModel::getPermission('Validation Ordre de Mission', Auth::user()->role_id);

        return view('fiche.detail', [
            'fiche'=>$fiche,
            'type'=>$type,
            'moyen'=>$moyen,
            'voiture'=>$voiture,
            'Validation_OM'=>$Validation_OM,

        ]);
    }
    public function update(FicheModifRequest $request,int $fiche_technique)
    {
       try {
        $fiche = FicheTechnique::findOrFail($fiche_technique);

        // $request->validate([
        //     'piece_mission' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
        // ]);

        // $fileName = $request->file('piece_mission')->getClientOriginalName();

        // $filePath = $request->file('piece_mission')->storeAs('CloudOrdreMission/Mission',$fileName,'public');

        $fiche->id_vehicule = $request->id_vehicule;
        $fiche->commentaire = $request->comment;

        $reussi = $fiche->save();

        if($reussi)
        {
            $fiche->update(['active'=>true, 'id_statut_demande_mission'=>'2']);
            $messages['prenom'] = $fiche->user->employe->prenom;
            $messages['nom'] = $fiche->user->employe->nom;

            Notification::route('mail',$fiche->user->employe->email)->notify(
                new SendEmailToCloseDemandeOrdreMissionNotification($messages)
            );
            toastr()->success('Bravo, vous avez clocturer la demande');
            return redirect()->route('fiche.validation');
        }
       } catch (Exception $e) {
        throw new Exception("Error Processing Request", 1);

       }

    }
    public function downloadpdf($fiche_technique)
    {
        try {

            // $main_image = base64_encode(file_get_contents(public_path('icon/ANPEJ_MINISTERE.png')));

            $OM_info = FicheTechnique::find($fiche_technique);
            $ImagePath = public_path('ANPEJ_MINISTERE.png');

            $pdf = PDF::loadView('mission.ordre_mission',[
                'OM_info'=>$OM_info,
                'ImagePath'=>$ImagePath,

            ]);
            return $pdf->download('fiche_ordre_de_mission'.$OM_info->user->employe->prenom.' '.$OM_info->user->employe->nom.'.pdf');

            // return view('mission.ordre_mission',compact('OM_info'));


           } catch (Exception $e) {

               throw new Exception('Une erreur est survenue lors du telechargement de l\'intervention');
           }
    }
}
