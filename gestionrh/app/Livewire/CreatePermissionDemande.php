<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RoleModel;
use App\Models\User;
use App\Models\DemandePermission;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailToEmployeAfterDemandeNotification;
use Auth;
use Carbon\Carbon;

class CreatePermissionDemande extends Component
{
    public $prenom;
    public $nom;
    public $date_depart;
    public $date_retour;
    public $motif_permission;
    public $nombre_jours_pris;
    public $id_chef_antenne;
    public $users;
    public $nombre_de_jour;

    public function render()
    {
        $toDate = Carbon::parse($this->date_depart);
        $fromDate = Carbon::parse($this->date_retour);

        $this->prenom = Auth::user()->employe->prenom;
        $this->nom = Auth::user()->employe->nom;

        $this->nombre_de_jour = Auth::user()->employe->nombre_conge_program;
        $users = User::where('role_id', Auth::user()->role_id)->get();
        // dd($users);

        // $roledirect = RoleModel::where('id', Auth::user()->role_id)->first();
        // dd($roledirect);

        $role_directeur = RoleModel::where('name','Directeur')->first();
        $role_antenne = RoleModel::where('name','Chef Antenne')->first();

        // $role_employeur = RoleModel::where('name','Employe')->first();

        $users_directeur = User::where('role_id', $role_directeur->id)->get();
        $users_antenne = User::where('role_id', $role_antenne->id)->get();

        // dd($users_antenne);

        if(isset($this->date_depart)&&(isset($this->date_retour)))
        {

            if($toDate->diffInDays($fromDate) > 4)
            {
                toastr()->error('Le nombre de jour ne doit pas depasser 3 jours');
            }
            if($toDate->diffInDays($fromDate) <= 3)
            {
                $this->nombre_jours_pris =  $toDate->diffInDays($fromDate);

                if(isset($this->nombre_jours_pris) <= $this->nombre_de_jour)
                {
                    $this->nombre_jours_pris =  '';
                    toastr()->error('Vous ne pouvez plus demandé une permission');

                }
                else
                {
                    $permission->nombre_jour =  $this->nombre_jours_pris;

                }
            }

        }

        return view('livewire.create-permission-demande',[
            'users_antenne'=>  $users_antenne,

        ]);
    }
    public function store(DemandePermission $permission)
    {
        $this->validate([

            'nom'=>'required',
            'prenom'=>'required',
            'date_depart'=>'string|required',
            'date_retour'=>'string|required',
            'nombre_jours_pris'=>'required',
            'id_chef_antenne'=>'required',
            'motif_permission'=>'required',

        ]);

        try {
            $toDate = Carbon::parse($this->date_depart);
            $fromDate = Carbon::parse($this->date_retour);

            $this->nombre_de_jour = Auth::user()->employe->nombre_conge_program;

            $permission->prenom = Auth::user()->employe->prenom;
            $permission->nom = Auth::user()->employe->nom;
            $permission->email = Auth::user()->employe->email;
            $permission->date_depart = $this->date_depart;
            $permission->date_retour = $this->date_retour;

            if($toDate->diffInDays($fromDate) <= 3)
            {
                $this->nombre_jours_pris =  $toDate->diffInDays($fromDate);

                if(isset($this->nombre_jours_pris) <= $this->nombre_de_jour)
                {
                    $this->nombre_jours_pris =  '';
                    toastr()->error('Vous ne pouvez plus demané une permission');

                }
                else
                {
                    $permission->nombre_jour =  $this->nombre_jours_pris;

                }

            }
            else
            {
                $this->nombre_jours_pris =  '';
                $permission->nombre_jour =  $this->nombre_jours_pris;
            }

            $permission->motif_demande = $this->motif_permission;
            $permission->id_chef_antenne = $this->id_chef_antenne;
            $permission->id_statut_permission = '1';
            // $permission->id_statut_permission_rh = '1';

            $reponse = $permission->save();
            if($reponse)
            {
                $messages['prenom'] = $permission->user->employe->prenom;
                $messages['nom'] = $permission->user->employe->nom;
                $messages['nbr_jour'] = $permission->nombre_jour;
                Notification::route('mail', $permission->user->employe->email)->notify(new
                SendEmailToEmployeAfterDemandeNotification($messages));

                toastr()->success('Bravo, La demande a été transféré au chef d\'antenne');

                return redirect()->route('demandepermission.liste');
            }

        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de l'enregistrement");

        }
    }

}
