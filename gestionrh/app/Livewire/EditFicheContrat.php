<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FicheContrat;
use App\Models\Employe;
use App\Models\Contrat;
use Livewire\WithFileUploads;

class EditFicheContrat extends Component
{
    use WithFileUploads;
    public $id_employe, $id_contrat, $fichier_contrat, $commentaire,
    $date_obtention_contrat, $date_fin_contrat, $date_always;
    public $fichecontrat;

    public function mount($fichecontrat)
    {
        $detailfiche = FicheContrat::with(['employe','contrat'])->findOrFail($this->fichecontrat);

        $this->id_employe = $detailfiche->id_employe;
        $this->id_contrat = $detailfiche->id_contrat;
        $this->date_obtention_contrat = $detailfiche->date_obtention_contrat;
        $this->date_fin_contrat = $detailfiche->date_fin_contrat;
        $this->date_always = $detailfiche->date_always === 'En cours' ? 'checked' : ' ';
        $this->commentaire = $detailfiche->commentaire;
        $this->fichier_contrat = $detailfiche->fichier_contrat;
    }
    public function render()
    {
        $employe = Employe::all();
        $contrat = Contrat::all();
        $fiche = FicheContrat::where('id', $this->fichecontrat)->first();
        return view('livewire.edit-fiche-contrat',[
            'employe'=> $employe,
            'contrat'=>$contrat,
            'fiche'=> $fiche,
        ]);
    }
    public function update(FicheContrat $fichecontrat)
    {
        $detailfiche = FicheContrat::findOrFail($this->fichecontrat);

        $this->validate([
            'id_employe'=>'required',
            'id_contrat'=>'required',
            'date_obtention_contrat'=>'required',
            // 'date_fin_contrat'=>'required',
            'commentaire'=>'required',
            'fichier_contrat'=>'required',
          ]);

           try {
            $detailfiche->id_employe = $this->id_employe;
            $detailfiche->id_contrat = $this->id_contrat;
            $detailfiche->date_obtention_contrat = $this->date_obtention_contrat;
            $detailfiche->date_fin_contrat = $this->date_fin_contrat;
            $detailfiche->date_always = $this->date_always === true ? 'En cours' : ' ';
            $detailfiche->commentaire = $this->commentaire;

            $fileName = time(). ".".$this->fichier_contrat->extension();
            $reponse = $this->fichier_contrat->storeAs('CloudImageContrat/Employe', $fileName, 'public');
            $detailfiche->fichier_contrat = $reponse;


            // dd($detailfiche);
            $detailfiche->update();

            toastr()->success('le contrat a été modifié avec succes');

            return redirect()->back();

           } catch (Exception $e) {
                throw new Exception("Erreur survenue lors de l'enregistrement", 1);

           }


    }
}
