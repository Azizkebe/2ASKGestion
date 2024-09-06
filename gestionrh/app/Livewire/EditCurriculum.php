<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employe;
use App\Models\Curriculum;
use Livewire\WithFileUploads;

class EditCurriculum extends Component
{
    use WithFileUploads;
    public $id_employe, $commentaire, $date_mis_a_jour, $curriculum, $curricula;

    public function mount($curricula)
    {
        $cv = Curriculum::findOrFail($this->curricula);

        $this->id_employe =  $cv->id_employe ;

        $this->commentaire = $cv->commentaire;
        $this->date_mis_a_jour = $cv->date_mise_a_jour ;
        $this->curriculum = $cv->curriculum ;
    }
    public function render()
    {
        $photo_cv = Curriculum::where('id_employe', $this->id_employe)->first();
        $employe = Employe::all();
        return view('livewire.edit-curriculum',[
            'employe'=>$employe,

        ]);
    }
    public function update(Curriculum $curricula)
    {
        $cv = Curriculum::findOrFail($this->curricula);

        $this->validate([
            'id_employe'=>'integer|required',
            'date_mis_a_jour'=>'required',
            'commentaire'=>'string|required',
            'curriculum' =>'mimes:pdf|max:8192',


          ]);

           try {

            $cv->id_employe = $this->id_employe;
            $cv->date_mise_a_jour = $this->date_mis_a_jour;
            $cv->commentaire = $this->commentaire;

            $fileName = time(). ".".$this->curriculum->extension();
            $reponse = $this->curriculum->storeAs('CloudImageCurriculum/Employe', $fileName, 'public');
            $cv->curriculum = $reponse;

            // dd($cv);
            $cv->update();
            toastr()->success('Le CV a été mise à jour avec succes');

            return redirect()->route('curriculum.liste');



           } catch (Exception $e) {
                throw new Exception("Erreur survenue lors de l'enregistrement", 1);

           }


    }
}
