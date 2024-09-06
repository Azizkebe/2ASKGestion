<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employe;
use App\Models\Curriculum;
use Livewire\WithFileUploads;


class CreateCurriculum extends Component
{
    use WithFileUploads;
    public $id_employe, $commentaire, $date_mis_a_jour, $curriculum;
    public function render()
    {
        $employe = Employe::all();
        return view('livewire.create-curriculum',[
            'employe'=>$employe,
        ]);
    }
    public function store(Curriculum $curriculum)
    {
        $this->validate([

            'id_employe'=>'integer|required',
            'date_mis_a_jour'=>'required',
            'commentaire'=>'string|required',
            'curriculum' =>'required|mimes:pdf|max:8192',

        ]);
        try {
            $curriculum->id_employe = $this->id_employe;
            $curriculum->date_mise_a_jour = $this->date_mis_a_jour;
            $curriculum->commentaire = $this->commentaire;

            $fileName = time(). ".".$this->curriculum->extension();
            $reponse = $this->curriculum->storeAs('CloudImageCurriculum/Employe', $fileName, 'public');
            $curriculum->curriculum = $reponse;

            // dd($curriculum);
            $curriculum->save();
            toastr()->success('Le CV est enregisté avec succes');

            return redirect()->back();
            resetValue();

        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de l'enregistrement", 1);

        }
    }
}
