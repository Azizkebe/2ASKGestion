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

    public $id_employe, $id_type_membre, $nom, $prenom, $justificative, $id, $membres;

    public function mount($membres)
    {
        $membre = Membre::findOrFail($this->membres);

        $this->id_employe =  $membre->id_employe ;

        $this->id_type_membre = $membre->id_type_membre;
        $this->nom = $membre->Nom ;
        $this->prenom = $membre->Prenom ;
        $this->justificative = $membre->photo_justificative ;
    }

    public function render()
    {
        $employe = Employe::all();
        $type = TypeMembre::all();
        $photo = Membre::where('id_employe', $this->id_employe)->first();

        return view('livewire.edit-membre',[
            'employe'=> $employe,
            'type'=>$type,
            'photo'=>$photo,
        ]);
    }
    public function update(Membre $membres)
    {
        $membre = Membre::findOrFail($this->membres);

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


            $membre->update();

            toastr()->success('Le membre est mise à jour avec succes');

            return redirect()->route('membre.liste');


           } catch (Exception $e) {
                throw new Exception("Erreur survenue lors de l'enregistrement", 1);

           }


    }
}
