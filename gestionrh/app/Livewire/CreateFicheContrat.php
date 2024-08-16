<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FicheContrat;
use App\Models\Employe;
use App\Models\Contrat;
use Livewire\WithFileUploads;


class CreateFicheContrat extends Component
{
    use WithFileUploads;
    public $id_employe, $id_contrat, $fichier_contrat, $commentaire,
    $date_obtention_contrat, $date_fin_contrat, $date_always;

    public function render()
    {
        $employe = Employe::all();
        $contrat = Contrat::all();
        return view('livewire.create-fiche-contrat',[
            'employe'=> $employe,
            'contrat'=>$contrat,
        ]);
    }
    public function store(FicheContrat $fiche)
    {

       $info_employe = Employe::where('id', $this->id_employe)->first();

        $this->validate([
            'id_employe'=>'required',
            'id_contrat'=>'required',
            'date_obtention_contrat'=>'required',
            // 'date_fin_contrat'=>'required',
            'commentaire'=>'required',
            'fichier_contrat'=>'required',
          ]);

           try {
            $fiche->id_employe = $this->id_employe;
            $fiche->id_contrat = $this->id_contrat;
            $fiche->date_obtention_contrat = $this->date_obtention_contrat;
            $fiche->date_fin_contrat = $this->date_fin_contrat;
            $fiche->date_always = $this->date_always === true ? 'En cours' : ' ';
            $fiche->commentaire = $this->commentaire;

            $fileName = time(). ".".$this->fichier_contrat->extension();
            $reponse = $this->fichier_contrat->storeAs('CloudImageContrat/Employe', $fileName, 'public');
            $fiche->fichier_contrat = $reponse;

            $fiche->save();

            toastr()->success('le contrat est enregistré avec succes');

            return redirect()->back();

           } catch (Exception $e) {
                throw new Exception("Erreur survenue lors de l'enregistrement", 1);

           }
    }
}
