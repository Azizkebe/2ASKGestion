<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
use App\Models\Employe;
use WithFileUploads;


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
                'username'=>'string|required',
                'email'=>'required|email',
                'naissance'=>'required',
                'lieu_naissance'=>'string|required',
                'sexe'=>'required',
                'matrimonial'=>'required',
                'nbr_enfant'=>'integer|required',
                'id_service'=>'required',
                'id_domaine_etude'=>'required',
                'id_dernier_diplome'=>'required',
                'id_dernier_contrat'=>'required',
                'id_niveau_etude'=>'required',
                'id_direction'=>'required',
                'id_poste'=>'required',
                // 'id_cloud_file_cv'=>'required',
                // 'id_cloud_file_diplome'=>'required',
              ]);
              try{
                // dd($this->imagephoto);
                DB::beginTransaction();
                $docData = [
                    'nom'=> $this->name,
                    'prenom'=> $this->username,
                    'email'=> $this->email,
                    'date_naissance' => $this->naissance,
                    'age'=> 20,
                    'lieu_naissance'=> $this->lieu_naissance,
                    'id_genre'=> $this->sexe,
                    'id_matrimonial'=> $this->matrimonial,
                    'nbr_enfant'=> $this->nbr_enfant,
                    'id_domaine'=> $this->id_domaine_etude,
                    'id_niveau_etude'=> $this->id_niveau_etude,
                    'id_diplome'=> $this->id_dernier_diplome,
                    'id_contrat'=> $this->id_dernier_contrat,
                    'id_direction'=> $this->id_direction,
                    'id_service'=> $this->id_service,
                    'id_bureau'=> $this->id_bureau,
                    'id_antenne'=> $this->id_antenne,
                    'id_poste'=> $this->id_poste,
                ];

                // dd($this->imagephoto);
                $employe = Employe::create($docData);
                $this->handleImagePhotoUpload($employe,'imagephoto');
                // $this->handleImagePhotoUpload($employe,'imagephoto','CloudImage/Employe','id_cloud_file_photo');


                return redirect()->back()->with('success','Le dossier de l\'employé a été enregistré avec succes');
                DB::commit();


        } catch (Exception $th) {
            DB::rollback();
            throw new Exception("Erreur inattendue survenue lors de l'enregistrement", 1);

        }
    }

    // public function handleImagePhotoUpload($data, $imagephoto, $destination, $attributeName)
    public function handleImagePhotoUpload($data, $imagephotof)
    {

       if($imagephotof)
        {
            $image = $imagephotof;

            // $imagename = time().' '.$image->getClientOriginalExtension();

            // //Chemin vers le fichier
            $filePath = $image->store($destination,'public');

            // $cloudfile = CloudFilePhoto::create([
            //     'path'=> $filePath,
            // ]);

            // $data->{$attributeName} = $cloudfile->id;

            // $data->update();
        }
    }
}
