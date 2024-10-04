<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employe;
use App\Models\ParamTypeConge;
use App\Models\User;
use Carbon\Carbon;
use Auth;

class CreateDemandeConge extends Component
{
    public $session_active;
    public $prenom;
    public $nom;
    public $date_depart;
    public $date_retour;
    public $nombre_jours_pris;
    public $motif_demande_conge;
    public $id_chef_antenne;

    public function render()
    {
        $toDate = Carbon::parse($this->date_depart);
        $fromDate = Carbon::parse($this->date_retour);

        $this->prenom = Auth::user()->employe->prenom;
        $this->nom = Auth::user()->employe->nom;

        $this->nombre_de_jour = Auth::user()->employe->nombre_conge_program;
        $users = User::where('role_id', Auth::user()->role_id)->get();

        $typeconge = ParamTypeConge::all();
        return view('livewire.create-demande-conge',[
            'typeconge'=>$typeconge,
        ]);
    }
}
