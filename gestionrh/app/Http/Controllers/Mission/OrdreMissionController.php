<?php

namespace App\Http\Controllers\Mission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrdreMission;
use App\Models\MoyenTransport;
use App\Models\TypeMission;
use App\Models\RoleModel;
use App\Models\User;
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

            $role_resp = RoleModel::where('name','Chef Parking')->first();
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
            $mission->cadre = $request->cadre;

            $mission->justificatif = $filePath;

            dd($mission);

            // $reussi = $mission->save();

            // if($reussi)
            // {
            //     $park->update(['id_validateur'=>$users_resp->employe->id,'id_statut_validateur'=> '1']);

            //     $messages_resp['prenom'] = $users_resp->employe->prenom;
            //     $messages_resp['nom'] = $users_resp->employe->nom;

            //     Notification::route('mail',$users_resp->email)->notify(
            //         new SendEmailToAfterDemandeVehiculeNotification($messages_resp)
            //     );

            //     toastr()->success('la demande est envoyée pour validation avec succes');
            //     return redirect()->back();

            // }


        }
        catch (Exception $e) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
}
