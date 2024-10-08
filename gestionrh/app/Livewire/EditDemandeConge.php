<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employe;
use App\Models\ParamTypeConge;
use App\Models\YearTable;
use App\Models\User;
use App\Models\RoleModel;
use App\Models\DemandeConge;
use Carbon\Carbon;
use Auth;

class EditDemandeConge extends Component
{
    public $session_active;
    public $prenom;
    public $nom;
    public $date_depart;
    public $date_retour;
    public $nombre_jours_pris;
    public $motif_demande_conge;
    public $id_chef_antenne;
    public $id_type_conge;
    public $nombre_de_jour;
    public $employe_conge;

    public function render()
    {
        return view('livewire.edit-demande-conge');
    }
}
