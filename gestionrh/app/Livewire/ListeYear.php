<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\YearTable;
use App\Models\ParamTypeConge;
use App\Models\PermissionConge;
use App\Models\Employe;
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
         $currentYear = Carbon::now()->format('Y');

            $employe = Employe::whereDoesntHave('year_table', function
            ($query) use ($currentYear){
                $query->where('annee_en_cours', '=', $currentYear);
            })->get();

            if($employe->count() == 0)
            {
                return redirect()->back()->with('Erreur','Tous les conges restants sont restitués');
            }

        // $totalPaid = 0;
        // $infoYear = YearTable::where('active','1')->first();
        // $year_info = $infoYear->annee_en_cours;
        // $currentYear = Carbon::now()->format('Y');
        // if($year_info == $currentYear)
        // {
        //     $paramconge = ParamTypeConge::where('id_yeartable',$infoYear->id)->first();
        //     $globalpermission = PermissionConge::where('id_param_type_conge',$paramconge->id)->get();
        //     foreach($globalpermission  as $global)
        //     {
        //         $totalPaid = $global->nombre_jours_pris + $totalPaid;
        //         dd($totalPaid);
        //     }


        // }
    }
    public function render()
    {
            $date_affiche = 2;
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
            ]);
    }
}
