<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Membre;
use App\Models\Employe;
use App\Models\TypeMembre;
use Livewire\WithFileUploads;

class CreateMembre extends Component
{
    use WithFileUploads;

    public $id_employe, $id_type_membre, $nom, $prenom, $justificative;

    public function resetValue()
    {
        $this->id_employe = '';
        $this->id_type_membre = ' ';
        $this->nom = ' ';
        $this->prenom = ' ';
        $this->justificative = ' ';
    }
    public function render()
    {
        $employe = Employe::all();
        $type = TypeMembre::all();
        return view('livewire.create-membre',[
            'employe'=> $employe,
            'type'=>$type,
        ]);
    }
    public function store(Membre $membre)
    {
        $this->validate([

            'id_employe'=>'integer|required',
            'id_type_membre'=>'integer|required',
            'prenom'=>'string|required',
            'nom'=>'string|required',

        ]);
        try {
            $membre->id_employe = $this->id_employe;
            $membre->id_type_membre = $this->id_type_membre;
            $membre->Nom = $this->nom;
            $membre->Prenom = $this->prenom;

            $fileName = time(). ".".$this->justificative->extension();
            $reponse = $this->justificative->storeAs('CloudImageMembre/Employe', $fileName, 'public');
            $membre->photo_justificative = $reponse;

            $membre->save();
            toastr()->success('Le membre est enregisté avec succes');

            return redirect()->back();
            resetValue();

        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de l'enregistrement", 1);

        }
    }
}
