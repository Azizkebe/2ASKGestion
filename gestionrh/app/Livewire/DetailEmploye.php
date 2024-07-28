<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employe;
class DetailEmploye extends Component
{
    public $employe;
    public function render()
    {
         $employes = Employe::with(['genre','matrimonial','domaine','niveauetude',
        'diplome','contrat','direction','service','antenne','bureau','poste',
        'photo','photocontrat','photodiplome','photoextrait','photocv'])->findOrFail($this->employe);
        // dd($employe);
        return view('livewire.detail-employe',compact('employes'));
    }
}
