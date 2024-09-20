<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RoleModel;
use App\Models\User;
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
    public $users;
    public function render()
    {
        $toDate = Carbon::parse($this->date_depart);
        $fromDate = Carbon::parse($this->date_retour);

        $this->prenom = Auth::user()->username;
        $this->nom = Auth::user()->name;

        $role_directeur = RoleModel::where('name','Directeur')->first();
        $role_antenne = RoleModel::where('name','Chef Antenne')->first();
        $role_employeur = RoleModel::where('name','Employe')->first();

        $users_directeurs = User::where('role_id', $role_directeur)->get();
        $role_antenne = User::where('role_id', $role_antenne)->get();


        if(isset($this->date_depart)&&(isset($this->date_retour)))
        {
            $this->nombre_jours_pris =  $toDate->diffInDays($fromDate);
        }

        return view('livewire.create-permission-demande');
    }
}
