<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RoleModel;
use App\Models\User;
use App\Models\DemandePermission;
use Auth;
use Carbon\Carbon;

class EditPermissionDemande extends Component
{
    public $prenom;
    public $nom;
    public $date_depart;
    public $date_retour;
    public $motif_permission;
    public $nombre_jours_pris;
    public $id_chef_antenne;
    public $users;
    public $demandepermission;

    public function mount($demandepermission)
    {


        $permission = DemandePermission::findOrFail($this->demandepermission);

        $this->prenom = $permission->prenom;
        $this->nom = $permission->nom;

        $this->date_retour = $permission->date_retour;
        $this->date_depart = $permission->date_depart;
        $this->nombre_jours_pris = $permission->nombre_jour;
        $this->motif_permission = $permission->motif_demande;
        $this->id_chef_antenne = $permission->id_chef_antenne;

    }

    public function render()
    {
        $toDate = Carbon::parse($this->date_depart);
        $fromDate = Carbon::parse($this->date_retour);

        $this->prenom = Auth::user()->employe->prenom;
        $this->nom = Auth::user()->employe->nom;

        $users = User::where('role_id', Auth::user()->role_id)->get();

        $role_directeur = RoleModel::where('name','Directeur')->first();
        $role_antenne = RoleModel::where('name','Chef Antenne')->first();
        // $role_employeur = RoleModel::where('name','Employe')->first();

        $users_directeur = User::where('role_id', $role_directeur->id)->get();
        $users_antenne = User::where('role_id', $role_antenne->id)->get();


        if(isset($this->date_depart)&&(isset($this->date_retour)))
        {

            if($toDate->diffInDays($fromDate) > 4)
            {
                toastr()->error('Le nombre de jour ne doit pas depasser 3 jours');
            }
            if($toDate->diffInDays($fromDate) <= 3)
            {
                $this->nombre_jours_pris =  $toDate->diffInDays($fromDate);
            }

        }
        return view('livewire.edit-permission-demande',[
            'users_antenne'=>  $users_antenne,
            // 'users_directeur'=> $users_directeur,
        ]);
    }
    public function update(DemandePermission $demandepermission)
    {
        $permission = DemandePermission::findOrFail($this->demandepermission);

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

            $permission->prenom = Auth::user()->employe->prenom;
            $permission->nom = Auth::user()->employe->nom;
            $permission->email = Auth::user()->employe->email;
            $permission->date_depart = $this->date_depart;
            $permission->date_retour = $this->date_retour;

            if($toDate->diffInDays($fromDate) <= 3)
            {
                $this->nombre_jours_pris =  $toDate->diffInDays($fromDate);
                $permission->nombre_jour =  $this->nombre_jours_pris;

            }
            else
            {
                $this->nombre_jours_pris =  '';
                $permission->nombre_jour =  $this->nombre_jours_pris;
            }

            $permission->motif_demande = $this->motif_permission;
            $permission->id_chef_antenne = $this->id_chef_antenne;

            if ($permission->id_statut_permission == '1')
            {
                $permission->id_statut_permission_rh = '1';

                $permission->update();
                toastr()->success('Bravo, La demande a été modifiée');
                return redirect()->route('demandepermission.liste');

            }
            else
            {
                $this->nombre_jours_pris = '';
                toastr()->error('Vous ne pouvez pas modifier la demande, Elle a été dejà traitée');
            }

        } catch (Exception $e) {
            throw new Exception('Erreur survenue lors de la mise à jour');
        }

    }
}
