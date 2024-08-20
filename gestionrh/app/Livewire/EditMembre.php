<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Membre;
use App\Models\Employe;
use App\Models\TypeMembre;
use Livewire\WithFileUploads;

class EditMembre extends Component
{
    use WithFileUploads;

    public $id_employe, $id_type_membre, $nom, $prenom, $justificative;

    public function render()
    {
        $employe = Employe::all();
        $type = TypeMembre::all();
        return view('livewire.edit-membre',[
            'employe'=> $employe,
            'type'=>$type,
        ]);
    }
}
