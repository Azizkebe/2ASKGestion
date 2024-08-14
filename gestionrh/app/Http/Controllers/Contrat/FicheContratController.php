<?php

namespace App\Http\Controllers\Contrat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FicheContrat;
use App\Models\Employe;
use App\Models\Contrat;
use App\Http\Requests\FicheContratRequest;

class FicheContratController extends Controller
{
    public function create()
    {
        $employe = Employe::all();
        $contrat = Contrat::all();
        return view('fichecontrat.create',[
            'employe'=> $employe,
            'contrat'=>$contrat,
        ]);
    }
    public function store(FicheContratRequest $request, FicheContrat $fiche)
    {
        try {
            $fiche->id_employe = $request->id_employe;
            $fiche->id_contrat = $request->id_contrat;
            $fiche->date_obtention_contrat = $request->date_obtention_contrat;
            $fiche->date_fin_contrat = $request->date_fin_contrat;
            $fiche->commentaire = $request->commentaire;
            $fiche->fichier_contrat = $request->fichier_contrat;

            // dd( $service);
            $fiche->save();

            toastr()->success('Le contrat a été enregistré avec succes');
            return redirect()->back();

        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
}
