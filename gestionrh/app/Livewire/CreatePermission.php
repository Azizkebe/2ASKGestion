<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employe;
use App\Models\StatutPermission;
use Carbon\Carbon;
use App\Models\Permission;
use App\Models\Conge;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailToEmployeAfterAcceptedPermissionNotification;

class CreatePermission extends Component
{
    public $id_employe;
    public $nombre_de_jour;
    public $date_depart;
    public $date_retour;
    public $jours_pris;
    public $commentaire;
    public $donnees_employe;
    public $st_permission;
    public $nombre_de_jour_conge_annuel;
    public $nbr_jour_restant_annuel;
    public $error;


    public function render()
    {


        $toDate = Carbon::parse($this->date_depart);
        $fromDate = Carbon::parse($this->date_retour);

    if(isset($this->id_employe)){

        $this->donnees_employe = Employe::where('id', $this->id_employe)->first();
        $this->nombre_de_jour = $this->donnees_employe->nombre_jour_permission ?? 0;


    }

    if(isset($this->date_depart)&&(isset($this->date_retour)))
    {
        $this->jours_pris =  $toDate->diffInDays($fromDate);

        if($this->jours_pris > $this->nombre_de_jour)
        {

            $this->nombre_de_jour = 0;
            // $this->jours_pris = 0;
            $this->error = toastr()->error('Attention, Le nombre de jour demandé est superieur au nombre de jour resservé');
        }
        if(($this->nombre_de_jour === 0)and($this->nombre_de_jour <= 0))
        {
            $this->nombre_de_jour = 0;

            $this->error = 'Desolé, Vous avez pris toutes permissions accordées';
        }
    }




        $employe = Employe::all();
        $permissions = StatutPermission::all();

        return view('livewire.create-permission',[
            'employe'=>$employe,
            'permissions'=>$permissions,
        ]
    );
    }
    public function store(Permission $permission)
    {

        $this->donnees_employe = Employe::where('id', $this->id_employe)->first();

        $this->nombre_de_jour = $this->donnees_employe->nombre_jour_permission ?? 0;

        $this->validate([

            'id_employe'=>'integer|required',
            'nombre_de_jour'=>'integer|required',
            'date_depart'=>'string|required',
            'date_retour'=>'string|required',
            'commentaire'=>'string|required',
            'st_permission'=>'required',



        ]);
        try {
            $permission->id_employe = $this->id_employe;
            $permission->date_depart = $this->date_depart;
            $permission->date_retour = $this->date_retour;

            $toDate = Carbon::parse($this->date_depart);
            $fromDate = Carbon::parse($this->date_retour);

            $permission->nombre_de_jour = $toDate->diffInDays($fromDate);

            if($permission->nombre_de_jour > $this->nombre_de_jour )
            {
                $this->error = 'Attention, Le nombre de jour demandé est superieur au nombre de jour restant';
                return redirect()->back()->with('error','Verifiez les informations de saisie');

            }
            elseif(($this->nombre_de_jour === 0)and($this->nombre_de_jour <= 0))
            {
                $this->nombre_de_jour = 0;
                $this->id_employe = 0;
                $this->error = 'Desolé, Vous avez pris toutes vos permissions';
            }
            else
            {

            // $this->nbr_jour_restant_annuel = $this->nombre_de_jour_conge_annuel - $permission->nombre_de_jour;

            // $permission->nombre_de_jour_restant =  $this->nbr_jour_restant;

            $permission->commentaire =  $this->commentaire;
            $permission->id_statut_permission =  $this->st_permission;

            //  dd($permission);
            $reussi = $permission->save();

            if($reussi){

                $this->nbr_jour_restant = $this->nombre_de_jour - $permission->nombre_de_jour;

                $this->donnees_employe->update(['nombre_jour_permission'=> $this->nbr_jour_restant]);


                // if($permission->id_statut_permission === '2')
                // {

                //     $this->donnees_employe->update(['nombre_jour_permission'=> $this->nbr_jour_restant]);

                // }
                // else
                // {

                //     $this->donnees_employe->update(['nombre_jour_permission'=> $this->nombre_de_jour]);

                // }

                $messages['prenom'] = $permission->employe->prenom;
                $messages['nom'] = $permission->employe->nom;
                $messages['todate'] =  $permission->date_depart;
                $messages['fordate'] = $permission->date_retour;
                $messages['nbr_jour'] = $permission->nombre_de_jour;
                $messages['permission'] = $permission->id_statut_permission === 1 ? 'Non' : 'Oui';

                Notification::route('mail', $permission->employe->email)->notify(new
                SendEmailToEmployeAfterAcceptedPermissionNotification($messages));

            }
             toastr()->success('Bravo, la permission est autorisée avec succes');

            return redirect()->route('permission.liste');

        }
    }
    catch (Exception $e) {
            throw new Exception("Erreur est survenue lors de l\'attribution d\'une permission ");

        }
    }
}
