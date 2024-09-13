<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\YearTable;
use App\Models\ParamTypeConge;
use App\Models\PermissionConge;
use Carbon\Carbon;

class ListeYear extends Component
{
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
        $totalPaid = 0;
        $infoYear = YearTable::where('active','1')->first();
        $year_info = $infoYear->annee_en_cours;
        $currentYear = Carbon::now()->format('Y');
        if($year_info == $currentYear)
        {
            $paramconge = ParamTypeConge::where('id_yeartable',$infoYear->id)->first();
            $globalpermission = PermissionConge::where('id_param_type_conge',$paramconge->id)->get();
            foreach($globalpermission  as $global)
            {
                $totalPaid = $global->nombre_jours_pris + $totalPaid;
                dd($totalPaid);
            }


        }
    }
    public function render()
    {
            $year = YearTable::all();
            return view('livewire.liste-year', compact('year'));
    }
}
