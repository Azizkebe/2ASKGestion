<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employe;
use Carbon\Carbon;
use App\Models\YearTable;
use App\Models\ParamTypeConge;
use App\Models\PermissionConge;
use App\Models\PermissionRoleModel;
use Auth;


class ListEmploye extends Component
{

    public $alreadyExist;
    public function ConfigureButton(Employe $donnees)
    {
        $totalPaid = 0;
        $infoYear = YearTable::where('active','1')->first();
        $year_info = $infoYear->annee_en_cours;
        $currentYear = Carbon::now()->format('Y');
        $currentDay = Carbon::now()->format('Y-m-d');
        $currentDayTerm = $currentYear."-01-01";

        dd($currentDayTerm);

        // $mounthMapping = [
        //     'JANUARY'=>'JANVIER',
        //     'FEBRUARY'=>'FEVRIER',
        //     'MARCH'=>'MARS',
        //     'APRIL'=>'AVRIL',
        //     'MAY'=>'MAI',
        //     'JUNE'=>'JUIN',
        //     'JULY'=>'JUILLET',
        //     'AUGUST'=>'AOUT',
        //     'SEPTEMBER'=>'SEPTEMBRE',
        //     'OCTOBER'=>'OCTOBRE',
        //     'NOVEMBER'=>'NOVEMBRE',
        //     'DECEMBER'=>'DECEMBRE',
        // ];
        // $currentMounth = strtoupper(Carbon::now());

        // $currentMonthFrench = $mounthMapping[$currentMounth] ?? '';

        // dd($currentMonthFrench);

        if($year_info == $currentYear)

        {

            $paramconge = ParamTypeConge::where('id_yeartable',$infoYear->id)->first();

            $globalpermission = PermissionConge::where('id_employe', $donnees->id)
                                                ->where('id_param_type_conge',$paramconge->id)
                                                ->get();
            foreach($globalpermission as $global)
            {
                $totalPaid = $global->nombre_jours_pris + $totalPaid;

            }

            $this->alreadyExist = $globalpermission->count();

            if($this->alreadyExist >= 1){

                toastr()->error('Vous avez déjà effectué la migration');
            }
            else{
                dd($totalPaid);
            }

        }
    }
    public function render()
    {
        $permissionEmploye = PermissionRoleModel::getPermission('Employe', Auth::user()->role_id);
        if(empty($permissionEmploye))
        {
            abort('404');
        }

        $PermissionAdd = PermissionRoleModel::getPermission('Ajouter Employe', Auth::user()->role_id);
        $PermissionEdit = PermissionRoleModel::getPermission('Editer Employe', Auth::user()->role_id);
        $PermissionDel = PermissionRoleModel::getPermission('Supprimer Employe', Auth::user()->role_id);


        $employe = Employe::with(['genre','matrimonial','domaine','niveauetude',
        'contrat','direction','service','antenne','bureau','poste',
        'photo'])->get();
        return view('livewire.list-employe', [
            'employe'=> $employe,
            'PermissionAdd'=> $PermissionAdd,
            'PermissionEdit'=> $PermissionEdit,
            'PermissionDel'=> $PermissionDel,


        ]);
    }
}
