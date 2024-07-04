<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Matrimonial;
use App\Models\Domaine;
use App\Models\NiveauEtude;
use App\Models\Diplome;
use App\Models\Contrat;
use App\Models\Direction;
use App\Models\Service;
use App\Models\Antenne;
use App\Models\Bureau;
use App\Models\Poste;


class EmployeController extends Controller
{
    public function create()
    {
        $genre = Genre::all();
        $matrimonial = Matrimonial::all();
        $domaine = Domaine::all();
        $niveau = NiveauEtude::all();
        $diplome = Diplome::all();
        $contrat = Contrat::all();
        $direction = Direction::all();
        $service = Service::all();
        $antenne = Antenne::all();
        $bureau = Bureau::all();
        $poste = Poste::all();

        return view('employe.create',[
            'genre'=>$genre,
            'matrimonial'=>$matrimonial,
            'domaine'=>$domaine,
            'niveau'=>$niveau,
            'diplome'=>$diplome,
            'contrat'=>$contrat,
            'direction'=>$direction,
            'service'=>$service,
            'antenne'=>$antenne,
            'bureau'=>$bureau,
            'poste'=>$poste,

        ]);
    }
}
