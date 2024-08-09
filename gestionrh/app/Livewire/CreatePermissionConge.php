<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Conge;
use App\Models\Employe;
use App\Models\PermissionConge;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailToEmployeAfterAcceptedCongeNotification;
use Carbon\Carbon;

class CreatePermissionConge extends Component
{
    public $id_employe, $id_conge, $nombre_de_jour, $date_depart, $date_retour, $jours_pris, $nombre_de_jour_demande, $permission_conge, $nombre_restant_jour;
    public function render()
    {
        $toDate = Carbon::parse($this->date_depart);
        $fromDate = Carbon::parse($this->date_retour);

    if(isset($this->id_conge)){

        $this->donnees_employe = Conge::where('id', $this->id_conge)->first();
        $this->permission_conge = PermissionConge::where('id_employe', $this->id_employe)->get();


        dd($this->permission_conge);

        $this->nombre_de_jour = $this->donnees_employe->nombre_jour_conge ?? 0;
        // $this->nombre_restant_jour = $this->permission_conge->nombre_jour_restant;


    }
    if(isset($this->date_depart)&&(isset($this->date_retour)))
    {
        $this->jours_pris =  $toDate->diffInDays($fromDate);


        if($this->jours_pris > $this->nombre_de_jour)
        {

            $this->nombre_de_jour = 0;

            toastr()->error('Attention, Le nombre de jour demandé est superieur au nombre de jour resservé');
        }
        if(($this->nombre_de_jour === 0)and($this->nombre_de_jour <= 0))
        {
            $this->nombre_de_jour = 0;

            toastr()->error('Desolé, Vous n\'avez plus de droit au congé');
        }
    }

        $conge = Conge::all();
        $employe = Employe::all();

        return view('livewire.create-permission-conge',[
            'conge'=>$conge,
            'employe'=>$employe,
        ]);
    }
    public function store(PermissionConge $permission)
    {
        $this->donnees_employe = Conge::where('id', $this->id_conge)->first();
        $this->permission_conge = PermissionConge::where('id', $this->id_conge)->first();

        $this->permission_conge->nombre_jour_restant = $this->donnees_employe->nombre_jour_conge - $this->nombre_de_jour_demande;

        $this->nombre_de_jour = $this->donnees_employe->nombre_jour_conge ?? 0;

        $this->validate([

            'id_employe'=>'integer|required',
            'nombre_de_jour'=>'integer|required',
            'date_depart'=>'string|required',
            'date_retour'=>'string|required',
            'id_conge'=>'required',]);

        try {
            $permission->id_employe = $this->id_employe;
            $permission->id_conge =  $this->id_conge;
            $permission->date_depart = $this->date_depart;
            $permission->date_retour = $this->date_retour;

            $toDate = Carbon::parse($this->date_depart);
            $fromDate = Carbon::parse($this->date_retour);

            $this->nombre_de_jour_demande = $toDate->diffInDays($fromDate);

            if($this->nombre_de_jour_demande > $this->nombre_de_jour )
            {
                toastr()->error('Attention, Le nombre de jour demandé est superieur au nombre de jour restant');
                // return redirect()->back()->with('error','Verifiez les informations de saisie');

            }
            elseif(($this->nombre_de_jour === 0)and($this->nombre_de_jour <= 0))
            {
                $this->nombre_de_jour = 0;
                $this->id_employe = 0;
                toastr()->error('Desolé, Vous avez pris tous vos congés');
            }
            else
            {
                // $permission->nombre_jours_pris = $this->nombre_de_jour_demande;

                $this->nbr_jour_restant_conge = $this->nombre_de_jour - $this->nombre_de_jour_demande;
                // $this->nbr_jour_restant_conge = $this->nombre_de_jour - $this->nombre_de_jour_demande;

                // dd($permission);
                $reussi = $permission->save();

                if($reussi){

                    $this->permission_conge->update(['nombre_jours_pris'=> $this->nombre_de_jour_demande,
                    'nombre_jour_restant'=> $this->nbr_jour_restant_conge]);

                    $messages['prenom'] = $permission->employe->prenom;
                    $messages['nom'] = $permission->employe->nom;
                    $messages['todate'] =  $permission->date_depart;
                    $messages['fordate'] = $permission->date_retour;
                    $messages['nbr_jour'] = $this->nombre_de_jour_demande;
                    $messages['permission'] = $permission->conge->nombre_jour_conge ?? '';

                    Notification::route('mail', $permission->employe->email)->notify(new
                    SendEmailToEmployeAfterAcceptedCongeNotification($messages));

                }
                 toastr()->success('Bravo, le congé est autorisé avec succes');

                return redirect()->route('conge.liste');

            }

        } catch (Exception $e) {
            throw new Exception("Erreur est survenue lors de l'enregistrement", 1);

        }
    }
}
