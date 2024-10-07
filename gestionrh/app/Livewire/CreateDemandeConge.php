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
    public $id_type_conge;
    public $nombre_de_jour;
    public $employe_conge;

    public function render()
    {
        // dd(Auth::user()->id_employe);
        $toDate = Carbon::parse($this->date_depart);
        $fromDate = Carbon::parse($this->date_retour);

        $this->prenom = Auth::user()->employe->prenom;
        $this->nom = Auth::user()->employe->nom;

        $this->nombre_de_jour = Auth::user()->employe->nombre_conge_program;
        $users = User::where('role_id', Auth::user()->role_id)->get();

        $typeconge = ParamTypeConge::all();

        if(isset($this->id_type_conge))
        {
            $info_year = ParamTypeConge::where('id', $this->id_type_conge)->first();
            $session = YearTable::where('id', $info_year->id_yeartable)->first();
            $this->session_active = $session->annee_en_cours;
        }
        if(isset($this->date_depart)&&(isset($this->date_retour)))
        {
            $info_year = ParamTypeConge::where('id', $this->id_type_conge)->first();

            $jours_pris =  $toDate->diffInDays($fromDate);

            if($jours_pris > 0 || ($jours_pris <= $info_year->nombre_de_jour_reserve))
            {
                $this->nombre_jours_pris =  $toDate->diffInDays($fromDate);
            }
            else
            {
                toastr()->error('Desolé, vous ne pouvez pas demandé un congé');
            }

        }
        $role_antenne = RoleModel::where('name','Chef Antenne')->first();

        $users_antenne = User::where('role_id', $role_antenne->id)->get();

        return view('livewire.create-demande-conge',[
            'typeconge'=>$typeconge,
            'users_antenne'=>$users_antenne,
        ]);
    }
    public function Store(DemandeConge $demande_conge)
    {
        // $toDate = Carbon::parse($this->date_depart);
        // $fromDate = Carbon::parse($this->date_retour);

        // if(isset($this->date_depart)&&(isset($this->date_retour)))
        // {
        //     $info_year = ParamTypeConge::where('id', $this->id_type_conge)->first();

        //     $jours_pris =  $toDate->diffInDays($fromDate);

        //     if($jours_pris > 0 || ($jours_pris <= $info_year->nombre_de_jour_reserve))
        //     {
        //         $this->nombre_jours_pris =  $toDate->diffInDays($fromDate);
        //     }
        //     else
        //     {
        //         toastr()->error('Desolé, vous ne pouvez pas demandé un congé');
        //     }

        // }


        $this->validate([

            'session_active'=>'required',
            'prenom'=>'required',
            'nom'=>'required',
            'date_depart'=>'string|required',
            'date_retour'=>'string|required',
            'id_type_conge'=>'required',
            'nombre_jours_pris'=>'required',
            'motif_demande_conge' =>'required',
            'id_chef_antenne' =>'required',

        ]);
        try {
            $info_year = ParamTypeConge::where('id', $this->id_type_conge)->first();

            $query = YearTable::where('id', $info_year->id_yeartable)->first();

            if($query->active == '1')
            {
                $this->nombre_de_jour = $this->info_year->nombre_de_jour_reserve ?? 0;

            }
            $demande_conge->prenom = $this->prenom;
            $demande_conge->nom = $this->nom;
            $demande_conge->email = Auth::user()->email;
            $demande_conge->id_param_type_conge = $this->id_type_conge;
            $demande_conge->date_depart = $this->date_depart;
            $demande_conge->date_retour = $this->date_retour;
            $demande_conge->nombre_jour_conge_pris = $this->nombre_jours_pris;
            $demande_conge->motif_demande_conge = $this->motif_demande_conge;
            $demande_conge->id_chef_antenne = $this->id_chef_antenne;
            $demande_conge->id_statut_permission = '1';
            $demande_conge->id_statut_permission_rh = '1';

            $demande_conge->save();

             toastr()->success('La demande a été transmis, Merci');
             return redirect()->route('demandeconge.liste');


        } catch (Exception $e) {



            throw new Exception("Error Processing Request", 1);

        }
    }
}
