<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employe;

class DossierEmploye extends Component
{
    public $employe;

    public function render()
    {

        $employes = Employe::findOrFail($this->employe);
        return view('livewire.dossier-employe', compact('employes'));
    }
}
