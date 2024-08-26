<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employe;
use App\Models\MyDiplome;
use App\Models\MonDiplome;
use Livewire\WithFileUploads;

class EditMydiplome extends Component
{
    use WithFileUploads;
    public $id_employe, $commentaire, $date_obtention_diplome, $diplome, $mydiplome, $id_diplome;

    public function mount($mydiplome)
    {
        $diplome = MyDiplome::findOrFail($this->mydiplome);

        $this->id_employe =  $diplome->id_employe ;
        $this->id_diplome =  $diplome->id_diplome ;
        $this->commentaire = $diplome->commentaire;
        $this->date_obtention_diplome = $diplome->date_obtention_diplome ;
        $this->diplome = $diplome->diplome ;
    }
    public function render()
    {
        $employe = Employe::all();
        $mondiplome = MonDiplome::all();
        $photo_diplome = MyDiplome::where('id_employe', $this->id_employe)->first();

        return view('livewire.edit-mydiplome',[
            'employe'=>$employe,
            'photodiplome'=>$photo_diplome,
            'mondiplome'=>$mondiplome,
        ]);
    }
    public function update(MyDiplome $mydiplome)
    {
        $diplome = MyDiplome::findOrFail($this->mydiplome);

        $this->validate([
            'id_employe'=>'integer|required',
            'date_obtention_diplome'=>'required',
            'commentaire'=>'string|required',
            'diplome'=>'required',
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
            toastr()->success('Le diplome a été mise à jour avec succes');

            return redirect()->route('mydiplome.liste');


           } catch (Exception $e) {
                throw new Exception("Erreur survenue lors de l'enregistrement", 1);

           }


    }
}
