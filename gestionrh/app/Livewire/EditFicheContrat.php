<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FicheContrat;
use App\Models\Employe;
use App\Models\TypeContrat;
use Livewire\WithFileUploads;

class EditFicheContrat extends Component
{
    use WithFileUploads;
    public $id_employe, $id_contrat, $commentaire,
    $date_obtention_contrat, $date_fin_contrat, $cache;
    public $fichier_contrat, $fichecontrat;
    public function mount($fichecontrat)
    {
        $detailfiche = FicheContrat::with(['employe','contrat'])->findOrFail($this->fichecontrat);

        $this->id_employe = $detailfiche->id_employe;
        $this->id_contrat = $detailfiche->id_typecontrat;
        $this->date_obtention_contrat = $detailfiche->date_obtention_contrat;
        $this->date_fin_contrat = $detailfiche->date_fin_contrat;
        $this->commentaire = $detailfiche->commentaire;
        $this->fichier_contrat = $detailfiche->fichier_contrat;
    }
    public function render()
    {
        if($this->id_contrat == '5')
        {
           $this->cache = '5';
        }
        else{
            $this->cache = '';
        }
        $employe = Employe::all();
        $typecontrat = TypeContrat::all();

        return view('livewire.edit-fiche-contrat',[
            'employe'=> $employe,
            'typecontrat'=>$typecontrat,
            // 'fiche'=> $fiche,
        ]);
    }
    public function update(FicheContrat $fichecontrat)
    {
        $detailfiche = FicheContrat::findOrFail($this->fichecontrat);

        $this->validate([
            'id_employe'=>'required',
            'id_contrat'=>'required',
            'date_obtention_contrat'=>'required',
            'commentaire'=>'required',
            'fichier_contrat' =>'mimes:pdf|max:8192',

              ]);

           try {
            $detailfiche->id_employe = $this->id_employe;
            // $detailfiche->id_contrat = $this->id_contrat;
            $detailfiche->date_obtention_contrat = $this->date_obtention_contrat;
            if($this->id_contrat == '5')
            {
                $fiche->date_fin_contrat = '';
            }
            else
            {
                $detailfiche->date_fin_contrat = $this->date_fin_contrat;
            }
            $detailfiche->commentaire = $this->commentaire;

            $fileName = time(). ".".$this->fichier_contrat->extension();
            $reponse = $this->fichier_contrat->storeAs('CloudImageContrat/Employe', $fileName, 'public');
            $detailfiche->fichier_contrat = $reponse;

            // dd($detailfiche);
            $detailfiche->update();

            toastr()->success('le contrat a été modifié avec succes');

            return redirect()->route('fiche_contrat.liste');

           } catch (Exception $e) {
                throw new Exception("Erreur survenue lors de l'enregistrement", 1);

           }


    }
}
