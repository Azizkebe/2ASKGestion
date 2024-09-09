<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\YearTable;

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
    public function render()
    {
        $year = YearTable::all();
        return view('livewire.liste-year', compact('year'));
    }
}
