<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DemandePermission;
use App\Models\StatutPermission;
use App\Models\User;
use Carbon\Carbon;
use App\Models\RoleModel;
use Auth;

class EditDemandeAntenne extends Component
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
    public $rep;

    public function mount($demandeantenne)
    {

        $permission = DemandePermission::findOrFail($this->demandeantenne);

        $this->prenom = $permission->prenom;
        $this->nom = $permission->nom;

        $this->date_retour = $permission->date_retour;
        $this->date_depart = $permission->date_depart;
        $this->nombre_jours_pris = $permission->nombre_jour;
        $this->motif_permission = $permission->motif_demande;
        $this->id_chef_antenne = $permission->id_chef_antenne;
        $this->statut_demande = $permission->id_statut_permission;

    }
    public function render()
    {
        $statutdemande = StatutPermission::all();

        if($this->statut_demande == '2')
        {

            $this->rep = "1";
        }
        else{

            $this->rep = "0";
        }
        // if(isset($this->id_responsable))
        // {
        //     $users = User::where('id', $this->id_responsable)->get();
        //     dd($users);
        // }

        $role_resp = RoleModel::where('name','Ressource Humaine')->first();
        $users_resp = User::where('role_id', $role_resp->id)->get();

        return view('livewire.edit-demande-antenne', [
            'statutdemande'=>$statutdemande,
            'users_resp'=>$users_resp,
        ]);
    }
    public function update(DemandePermission $demandeantenne)
    {
        $permission = DemandePermission::findOrFail($this->demandeantenne);

        $this->validate([

            'nom'=>'required',
            'prenom'=>'required',
            'date_depart'=>'string|required',
            'date_retour'=>'string|required',
            'nombre_jours_pris'=>'required',
            'statut_demande'=>'required',
            'motif_permission'=>'required',

        ]);
        try {
            $toDate = Carbon::parse($this->date_depart);
            $fromDate = Carbon::parse($this->date_retour);


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
            if($permission->statut->statut_demande == 'En cours')
            {
                $permission->id_statut_permission = $this->statut_demande;

                $permission->id_statut_permission_rh = '1';

                if(isset($this->id_responsable))
                {
                    $permission->id_responsable = $this->id_responsable;
                }


                // dd($permission);

                $permission->update();
                toastr()->success('Bravo, Vous avez repondu à la demande et a été transmis au RH.');
                return redirect()->route('demandepermission.liste');
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
