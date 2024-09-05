<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FicheContrat;
use App\Models\Employe;
use App\Models\TypeContrat;
use Livewire\WithFileUploads;


class CreateFicheContrat extends Component
{
    use WithFileUploads;
    public $id_employe, $id_contrat, $commentaire,
    $date_obtention_contrat, $date_fin_contrat, $cache;
    public $fichier_contrat;

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
        $contrat = TypeContrat::all();

        return view('livewire.create-fiche-contrat',[
            'employe'=> $employe,
            'typecontrat'=>$contrat,
        ]);
    }
    public function store(FicheContrat $fiche)
    {

       $info_employe = Employe::where('id', $this->id_employe)->first();

        $this->validate([
            'id_employe'=>'required',
            'id_contrat'=>'required',
            'date_obtention_contrat'=>'required',
            'commentaire'=>'required',
            'fichier_contrat'=>'image|mimes:pdf,png,jpg,jpeg',
          ]);

           try {
            $fiche->id_employe = $this->id_employe;
            $fiche->id_typecontrat = $this->id_contrat;
            $fiche->date_obtention_contrat = $this->date_obtention_contrat;

            if($this->id_contrat == '5')
            {
                $fiche->date_fin_contrat = '';
            }
            else
            {
                $fiche->date_fin_contrat = $this->date_fin_contrat;
            }
            $fiche->commentaire = $this->commentaire;

            $fileName = time(). ".".$this->fichier_contrat->extension();
            $reponse = $this->fichier_contrat->storeAs('CloudImageContrat/Employe', $fileName, 'public');
            $fiche->fichier_contrat = $reponse;

            // dd($fiche);
            $fiche->save();

            toastr()->success('le contrat est enregistré avec succes');

            return redirect()->back();
            $this->render();

           } catch (Exception $e) {
                throw new Exception("Erreur survenue lors de l'enregistrement", 1);

           }
    }

}
