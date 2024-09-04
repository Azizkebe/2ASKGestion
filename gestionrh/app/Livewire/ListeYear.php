<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\YearTable;

class ListeYear extends Component
{
    public function render()
    {
        $year = YearTable::all();
        return view('livewire.liste-year', compact('year'));
    }
}
