<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RoleModel;
use App\Models\User;
use App\Models\DemandePermission;
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

    public function render()
    {
        $toDate = Carbon::parse($this->date_depart);
        $fromDate = Carbon::parse($this->date_retour);

        $this->prenom = Auth::user()->username;
        $this->nom = Auth::user()->name;

        $users = User::where('role_id', Auth::user()->role_id)->get();

        // dd(Auth::user()->role->name);

        $role_directeur = RoleModel::where('name','Directeur')->first();
        $role_antenne = RoleModel::where('name','Chef Antenne')->first();
        $role_employeur = RoleModel::where('name','Employe')->first();

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

        return view('livewire.create-permission-demande',[
            'users_antenne'=>  $users_antenne,
            'users_directeur'=> $users_directeur,
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

            $permission->prenom = Auth::user()->name;
            $permission->nom = Auth::user()->username;
            $permission->email = Auth::user()->email;
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
            $permission->id_statut_permission = '1';

            // dd($permission);
            $permission->save();
            toastr()->success('Bravo, La demande a été transféré au chef d\'antenne');

            return redirect()->route('demandepermission.liste');

        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de l'enregistrement");

        }
    }

}
