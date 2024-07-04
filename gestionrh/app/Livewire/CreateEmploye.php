<?php

namespace App\Livewire;

use Livewire\Component;
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

class CreateEmploye extends Component
{

public $name, $username, $email, $naissance, $age, $lieu_naissance;
public $sexe, $matrimonial, $nbr_enfant, $id_domaine_etude, $id_niveau_etude, $id_dernier_diplome;
public $id_dernier_contrat, $id_direction, $id_service, $id_bureau, $id_poste, $id_antenne, $imagephoto, $imagecv;
public $imagediplome, $imagecontrat, $imageextrait;

    public function render()
    {
        $genre = Genre::all();
        $matri = Matrimonial::all();
        $domaine = Domaine::all();
        $niveau = NiveauEtude::all();
        $diplome = Diplome::all();
        $contrat = Contrat::all();
        $direction = Direction::all();
        $service = Service::where('id_direction', $this->id_direction)->get();
        $antenne = Antenne::where('id_direction', $this->id_direction)->get();
        $bureau = Bureau::where('id_antenne', $this->id_antenne)->get();
        $poste = Poste::all();

        return view('livewire.create-employe',[
            'genre'=>$genre,
            'matri'=>$matri,
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
    public function store()
    {

              $this->validate([
                'name'=>'string|required',
                'prenom'=>'string|required',
                'email'=>'required|email',
                'date_naissance'=>'required',
                'id_matrimonial'=>'required',
                'nbr_enfant'=>'integer|required',
                'id_domonaine'=>'required',
                'id_contrat'=>'required',
                'id_niveau_etude'=>'required',
                'id_direction'=>'required',
                'id_poste'=>'required',
                'id_cloud_file_cv'=>'required',
                'id_cloud_file_diplome'=>'required',
              ]);
              try{

                DB::beginTransaction();
                $productData = [
                    'name'=> $this->name,
                    'prenom'=> $this->surname,
                    'email'=> $this->email,
                    'date_naissance' => $this->naissance,
                    'age'=> 20,
                    'lieu_naissance'=> $this->lieu_naissance,
                    'id_genre'=> $this->sexe,
                    'id_matrimonial'=> $this->matrimonial,


                ];
                // dd($request);
                $products = Product::create($productData);
                $this->handleImageUpload($products,$request,'image','CloudFile/Products','cloudfile_id');


                return redirect()->route('article.liste')->with('success','Le produit à été ajouté avec succes');
                DB::commit();


        } catch (Exception $th) {
            throw new Exception("Erreur inattendue survenue lors de l'enregistrement", 1);

        }
    }
}
