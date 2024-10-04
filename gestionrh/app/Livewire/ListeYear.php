<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\YearTable;
use App\Models\ParamTypeConge;
use App\Models\PermissionConge;
use App\Models\PermissionRoleModel;
use App\Models\Employe;
use Carbon\Carbon;

use Auth;

class ListeYear extends Component
{
    public $paramconge;
    public function toggleStatus(YearTable $curent_year)
    {
        //Mettre à jour toutes les lignes de table active à 0
        $query = YearTable::where('active','1')->update(['active'=>'0']);
        // Mettre à jour le status de l'enregistrement grace à son identifiant
        $curent_year->active = '1';
        $curent_year->save();
        $this->render();

    }
     public function ConfigureButton()
    {
        //  $currentYear = Carbon::now()->format('Y');

        //     $employe = Employe::whereDoesntHave('year_table', function
        //     ($query) use ($currentYear){
        //         $query->where('annee_en_cours', '=', $currentYear);
        //     })->get();

        //     if($employe->count() == 0)
        //     {
        //         return redirect()->back()->with('Erreur','Tous les conges restants sont restitués');
        //     }

        // dd(Auth::user()->id_employe);
        $totalPaid = 0;
        $infoYear = YearTable::where('active','1')->first();
        $year_info = $infoYear->annee_en_cours;
        $currentYear = Carbon::now()->format('Y');


        if($year_info == $currentYear)
        {
            $lastYear_id = $infoYear->id - 1;
            $this->paramconge = ParamTypeConge::where('id_yeartable',$lastYear_id)->first();

            $globalpermission = PermissionConge::where('id_param_type_conge',$this->paramconge->id)
                                                ->where('id_employe', 27)->get();
            foreach($globalpermission  as $global)
            {
                $totalPaid = $global->nombre_jours_pris + $totalPaid;
            }

            $employe1 = Employe::where('id', Auth::user()->id_employe)->first();
            $totalRest = $this->paramconge->nombre_de_jour_reserve - $totalPaid;
            $totalAjout = $employe1->nombre_conge_program + $totalRest;

             $result_passe = $employe1->update(['nombre_conge_program'=> $totalAjout]);

             if($result_passe)
             {
                $globalpermission = PermissionConge::where('id_employe', Auth::user()->id_employe)->get();
                foreach($globalpermission  as $global)
                {
                    $this->paramconge->id = 0;
                    toastr()->success('Bravo, Tous les congés sont restitués');
                    return redirect()->back();

                }
             }
             else
             {
                toastr()->error('Impossible d\'effectuer l\'operation');
                return redirect()->back();
             }


        }
    }
    public function render()
    {

        $permissionConfiguration = PermissionRoleModel::getPermission('Configuration', Auth::user()->role_id);
        if(empty($permissionConfiguration))
        {
            abort('404');
        }
        $permission_config_status = PermissionRoleModel::getPermission('Config_status', Auth::user()->role_id);
        $permission_config_add = PermissionRoleModel::getPermission('Config_ajout', Auth::user()->role_id);
        $permission_config_del = PermissionRoleModel::getPermission('Config_supprime', Auth::user()->role_id);
        $permission_config_edit = PermissionRoleModel::getPermission('Config_editer', Auth::user()->role_id);


            $date_affiche = 3;
            $mois_affiche = 10;

            $currentDay = Carbon::now()->day;

            $currentMonth = Carbon::now()->month;

                $is_visible = false;

            if(($currentDay == $date_affiche)&&($currentMonth == $mois_affiche))
            {
                $is_visible = true;
            }

            $year = YearTable::all();
            return view('livewire.liste-year', [
                'year'=>$year,
                'is_visible'=> $is_visible,
                'permission_config_status'=>$permission_config_status,
                'permission_config_add'=>$permission_config_add,
                'permission_config_del'=>$permission_config_del,
                'permission_config_edit'=>$permission_config_edit,
            ]);
    }
}
