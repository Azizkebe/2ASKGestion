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
use App\Models\CloudFilePhoto;
use App\Models\CloudFileCv;
use App\Models\CloudFileDiplome;
use App\Models\CloudFileContrat;
use App\Models\CloudFileExtrait;
use Livewire\WithFileUploads;
use Carbon\Carbon;


class CreateEmploye extends Component
{
    use WithFileUploads;

public $name, $username, $email, $naissance, $age, $lieu_naissance;
public $sexe, $matrimonial, $nbr_enfant, $id_domaine_etude, $id_niveau_etude, $id_dernier_diplome;
public $id_dernier_contrat, $id_direction, $id_service, $id_bureau, $id_poste, $id_antenne, $imagephoto, $imagecv;
public $imagediplome, $imagecontrat ;
public $imageextrait = [];

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
        $currentday =(int) Carbon::now()->format('Y');
        $dateanniv = (int) Carbon::parse($this->naissance)->format('Y');

        if(isset($this->naissance))
        {
            $this->age = $currentday - $dateanniv;
        }
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

              ]);
              try{

                DB::beginTransaction();
                $currentday =(int) Carbon::now()->format('Y');
                $dateanniv = (int) Carbon::parse($this->naissance)->format('Y');
                $docData = [
                    'nom'=> $this->name,
                    'prenom'=> $this->username,
                    'email'=> $this->email,
                    'date_naissance' => $this->naissance,
                    'age'=> $currentday - $dateanniv,
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

                // dd($docData);
                $employe = Employe::create($docData);
                $this->handleImagePhotoUpload($employe,$this->imagephoto,'CloudImage/Employe','id_cloud_file_photo');
                $this->handleImageCVUpload($employe,$this->imagecv,'CloudImageCV/Employe','id_cloud_file_cv');
                $this->handleImageDiplomeUpload($employe,$this->imagediplome,'CloudImageDiplome/Employe','id_cloud_file_diplome');
                $this->handleImageContratUpload($employe,$this->imagecontrat,'CloudImageContrat/Employe','id_cloud_file_contrat');
                $this->handleImageExtraitUpload($employe,$this->imageextrait,'CloudImageExtrait/Employe','id_cloud_file_extrait');

                toastr()->success('Le dossier de l\'employé a été enregistré avec succes');
                return redirect()->route('employe.liste');
                DB::commit();


        } catch (Exception $th) {
            DB::rollback();
            throw new Exception("Erreur inattendue survenue lors de l'enregistrement", 1);

        }
    }

    // public function handleImagePhotoUpload($data, $imagephoto, $destination, $attributeName)
    public function handleImagePhotoUpload($data, $imagephoto, $destination, $attributeName)
    {

       if($this->imagephoto)
        {
            $image = $this->imagephoto;

            // $imagename = time().' '.$image->getClientOriginalExtension();

            // //Chemin vers le fichier
            $filePath = $image->store($destination,'public');

            $cloudfile = CloudFilePhoto::create([
                'photo_employe'=> $filePath,
            ]);

            $data->{$attributeName} = $cloudfile->id;

            $data->update();

        }
    }
    public function handleImageCVUpload($data, $imagecv, $destination2, $attributeName2)
    {

       if($this->imagecv)
        {
            $image = $this->imagecv;

            // $imagename = time().' '.$image->getClientOriginalExtension();

            // //Chemin vers le fichier
            $filePath = $image->store($destination2,'public');

            $cloudfile = CloudFileCv::create([
                'image_cv'=> $filePath,
            ]);

            $data->{$attributeName2} = $cloudfile->id;

            $data->update();
        }
    }
    public function handleImageDiplomeUpload($data, $imagediplome, $destination3, $attributeName3)
    {

       if($this->imagediplome)
        {
            $image = $this->imagediplome;

            // $imagename = time().' '.$image->getClientOriginalExtension();

            // //Chemin vers le fichier
            $filePath = $image->store($destination3,'public');

            $cloudfile = CloudFileDiplome::create([
                'image_diplome'=> $filePath,
            ]);

            $data->{$attributeName3} = $cloudfile->id;

            $data->update();

        }
    }
    public function handleImageContratUpload($data, $imagecontrat, $destination4, $attributeName4)
    {

        if($this->imagecontrat)
        {
            $image = $this->imagecontrat;

            // //Chemin vers le fichier
            $filePath = $image->store($destination4,'public');

            $cloudfile = CloudFileContrat::create([
                'image_contrat'=> $filePath,
            ]);

            $data->{$attributeName4} = $cloudfile->id;

            $data->update();

        }
    }
    public function handleImageExtraitUpload($data, $imageextrait, $destination5, $attributeName5)
    {

       if($this->imageextrait)
        {
            $image = $this->imageextrait;

            // $imagename = time().' '.$image->getClientOriginalExtension();

            // //Chemin vers le fichier
            foreach ($this->imageextrait as $image) {

                $filePath = $image->store($destination5,'public');
            }

            $cloudfile = CloudFileExtrait::create([
                'image_extrait'=> $filePath,
            ]);

            $data->{$attributeName5} = $cloudfile->id;

            $data->update();
            // dd($data);
        }
    }

}
