<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employe;
use App\Models\MyDiplome;
use App\Models\MonDiplome;

use Livewire\WithFileUploads;

class CreateMydiplome extends Component
{
    use WithFileUploads;
    public $id_employe, $commentaire, $date_obtention_diplome, $diplome, $id_diplome;

    public function render()
    {
        $employe = Employe::all();
        $mondiplome = MonDiplome::all();

        return view('livewire.create-mydiplome',[
            'mondiplome'=>$mondiplome,
            'employe'=>$employe,
        ]);
    }
    public function store(MyDiplome $diplome)
    {
        $this->validate([

            'id_employe'=>'integer|required',
            'date_obtention_diplome'=>'required',
            'commentaire'=>'string|required',
            'diplome' =>'required|mimes:pdf|max:8192',
            'id_diplome'=>'required',

        ]);
        try {
            $diplome->id_employe = $this->id_employe;
            $diplome->id_diplome = $this->id_diplome;
            $diplome->date_obtention_diplome = $this->date_obtention_diplome;
            $diplome->commentaire = $this->commentaire;

            $fileName = time(). ".".$this->diplome->extension();
            $reponse = $this->diplome->storeAs('CloudImageDiplome/Employe', $fileName, 'public');
            $diplome->diplome = $reponse;

            $diplome->save();
            toastr()->success('Le diplome est enregisté avec succes');

            return redirect()->route('mydiplome.liste');


        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de l'enregistrement", 1);

        }
    }
}
