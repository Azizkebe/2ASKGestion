<?php

namespace App\Http\Controllers\Mission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailToAfterDemandeOrdreMissionNotification;
use App\Models\OrdreMission;
use App\Models\StatutDemandeMission;
use App\Models\MoyenTransport;
use App\Models\TypeMission;
use App\Models\RoleModel;
use App\Models\User;
use Auth;
use App\Http\Requests\MissionRequest;

class OrdreMissionController extends Controller
{
    public function liste()
    {
        $ordre = OrdreMission::all();

        return view('mission.liste', compact('ordre'));
    }
    public function add()
    {
        $mission = TypeMission::all();
        $moyen = MoyenTransport::all();

        return view('mission.add',[
            'mission'=>$mission,
            'moyen'=>$moyen,
        ]);
    }
    public function store(MissionRequest $request,OrdreMission $mission )
    {
        try {

            $role_resp = RoleModel::where('name','Ressource Humaine')->first();
            $users_resp = User::where('role_id',$role_resp->id)->first();

            $request->validate([
                'piece_mission' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            ]);

            $fileName = $request->file('piece_mission')->getClientOriginalName();

            $filePath = $request->file('piece_mission')->storeAs('CloudPieceDemande/Mission',$fileName,'public');

            $user = Auth::user();
            $user_id = $user->id;

            $mission->activite = $request->activite;
            $mission->id_user = $user_id;
            $mission->destination = $request->destination;
            $mission->date_depart = $request->date_depart;
            $mission->date_retour = $request->date_retour;
            $mission->moyen_transport = $request->id_moyen_transport;
            $mission->type_mission = $request->id_type_mission;
            $mission->frais = $request->cadre;

            $mission->justificatif = $filePath;

            $reussi = $mission->save();

            if($reussi)
            {
                $mission->update(['id_validateur'=>$users_resp->id_employe,'id_statut_demande_mission'=> '1']);

                $messages_resp['prenom'] = $users_resp->employe->prenom;
                $messages_resp['nom'] = $users_resp->employe->nom;

                Notification::route('mail',$users_resp->email)->notify(
                    new SendEmailToAfterDemandeOrdreMissionNotification($messages_resp)
                );

                toastr()->success('la demande d\'ordre de mission est envoyée pour traitement avec succes');
                return redirect()->back();

            }

        }
        catch (Exception $e) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function edit_validation(int $ordre_mission)
    {
        $mission = OrdreMission::findOrFail($ordre_mission);
        $type = TypeMission::all();
        $moyen = MoyenTransport::all();

        return view('mission.edit',[
            'mission'=>$mission,
            'type'=>$type,
            'moyen'=>$moyen,

        ]);
    }
    public function validation()
    {
        $mission = OrdreMission::where('id_validateur',Auth::user()->employe->id)->get();

        return view('mission.validation', compact('mission'));
    }
    public function edit_mission(Request $request)
    {
        $mission = OrdreMission::where('id', $request->id)->get();
        $etat = StatutDemandeMission::all();

        return response()->json(['etat'=>$etat,'mission'=>$mission]);
    }
    public function store_mission()
    {
        $mission = OrdreMission::findOrFail($request->id);

        $mission->id_statut_demande_mission = $request->statut_id;
        $mission->commentaire = $request->commentaire;

        $mission->save();

        return response()->json(['success'=>true,'msg'=>$request]);
        toastr()->success('La reponse à la demande a été enregistrer avec success');
        return redirect()->route('ordre_mission.validation');
        // if($mission->id_statut_demande_mission == '1')
        // {
        //     $reponse = $mission->save();
        //     if($reponse)
        //     {
        //         $messages_resp['prenom'] = $users_resp->employe->prenom;
        //         $messages_resp['nom'] = $users_resp->employe->nom;

        //         Notification::route('mail',$users_resp->email)->notify(
        //             new SendEmailToAfterResponseDemandeOrdreMissionNotification($messages_resp)
        //         );
        //         return response()->json(['success'=>true,'msg'=>$request]);
        //         toastr()->success('La reponse à la demande a été enregistrer avec success');
        //         return redirect()->route('ordre_mission.validation');
        //     }
        //     else
        //     {
        //         toastr()->error('Impossible d\'effectuer la validation');
        //         return redirect()->back();
        //     }
        // }
        // else
        // {
        //     toastr()->error('Erreur, Vous avez déjà repondu à la demande');
        //     return redirect()->route('ordre_mission.validation');
        // }
    }
}
