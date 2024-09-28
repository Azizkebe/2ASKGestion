<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DemandePermission;
use App\Models\StatutPermissionRH;
use App\Models\RoleModel;
use App\Models\User;
use App\Models\Employe;


class EditAcceptePermission extends Component
{
    public $prenom;
    public $nom;
    public $date_depart;
    public $date_retour;
    public $motif_permission;
    public $nombre_jours_pris;
    public $id_chef_antenne;
    public $demandeantenne;
    public $statut_demande;
    public $id_responsable;
    public $id_statut_permission_rh;
    public $demande_resp;

    public function mount($demande_resp)
    {

        $permission = DemandePermission::findOrFail($this->demande_resp);

        $this->prenom = $permission->prenom;
        $this->nom = $permission->nom;
        $this->date_retour = $permission->date_retour;
        $this->date_depart = $permission->date_depart;
        $this->nombre_jours_pris = $permission->nombre_jour;
        $this->motif_permission = $permission->motif_demande;
        $this->id_chef_antenne = $permission->id_chef_antenne;
        $this->id_statut_permission_rh = $permission->id_statut_permission_rh;

    }
    public function render()
    {
        $statut_permission = StatutPermissionRH::all();

        return view('livewire.edit-accepte-permission', [
            'statut_permission'=>$statut_permission,
        ]);
    }

    public function update(DemandePermission $demande_resp)
    {
        $permission = DemandePermission::findOrFail($this->demande_resp);

        $this->validate([

            'nom'=>'required',
            'prenom'=>'required',
            'date_depart'=>'string|required',
            'date_retour'=>'string|required',
            'nombre_jours_pris'=>'required',
            'id_statut_permission_rh'=>'required',
            'motif_permission'=>'required',

        ]);
        try {

            if($permission->statut_rh->statut_demande_rh == 'En cours')
            {
                $permission->id_statut_permission_rh = $this->id_statut_permission_rh;

                $reponse = $permission->update();

                if($reponse)
                {
                    $employe = Employe::where('email', $permission->email)->first();
                    $employe->update(['nombre_conge_program'=> $employe->nombre_conge_program - $permission->nombre_jour]);

                    toastr()->success('Bravo, Vous avez repondu à la demande adressée.');
                    return redirect()->route('demande_resp.liste');
                }
            }
            else
            {
                $this->nombre_jours_pris = '';
                toastr()->error('Desolé, vous ne pouvez plus repondre à la demande car elle a traitée, Merci');
            }

        } catch (Exception $e) {
            //throw $th;
        }
    }
}
