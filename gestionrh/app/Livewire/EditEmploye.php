<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\DB;
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

class EditEmploye extends Component
{

    use WithFileUploads;

public $name, $username, $email, $naissance, $age, $lieu_naissance = '';
public $sexe, $matrimonial, $nbr_enfant, $id_domaine_etude, $id_niveau_etude, $id_dernier_diplome = '';
public $id_dernier_contrat, $id_direction, $id_service, $id_bureau, $id_poste, $id_antenne, $imagephoto, $imagecv = '';
public $imagediplome, $imagecontrat = '';
public $imageextrait = [];
public $totalStep = 4;
public $currentStep = 1;
public $employe, $info_employe, $telephone, $adresse;


    public function mount(Employe $employe)
    {
        $this->currentStep = 1;
        $this->info_employe = Employe::with(['genre','matrimonial','domaine','niveauetude',
        'diplome','contrat','direction','service','antenne','bureau','poste',
        'photo','photocontrat','photodiplome','photoextrait','photocv'])->findOrFail($this->employe);
        // dd($info_employe);
        $this->name =  $this->info_employe->nom;
        $this->username =  $this->info_employe->prenom;
        $this->telephone =  $this->info_employe->telephone;
        $this->adresse =  $this->info_employe->adresse;
        $this->email =  $this->info_employe->email;
        $this->naissance =  $this->info_employe->date_naissance;
        $this->age =  $this->info_employe->age;
        $this->lieu_naissance =  $this->info_employe->lieu_naissance;
        $this->sexe =  $this->info_employe->id_genre;
        $this->matrimonial =  $this->info_employe->id_matrimonial;
        $this->nbr_enfant =  $this->info_employe->nbr_enfant;
        $this->id_domaine_etude =  $this->info_employe->id_domaine;
        $this->id_niveau_etude =  $this->info_employe->id_niveau_etude;
        $this->id_diplome =  $this->info_employe->id_diplome;
        $this->id_contrat =  $this->info_employe->id_contrat;
        $this->id_direction =  $this->info_employe->id_direction;
        $this->id_service =  $this->info_employe->id_service;
        $this->id_antenne =  $this->info_employe->id_antenne;
        $this->id_bureau =  $this->info_employe->id_bureau;
        $this->id_poste =  $this->info_employe->id_poste;
        $this->imagephoto =  $this->info_employe->id_cloud_file_photo;
        $this->imagediplome =  $this->info_employe->id_cloud_file_diplome;
        $this->imageextrait =  $this->info_employe->id_cloud_file_extrait;
    }
    public function increaseStep()
    {

        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalStep){
            $this->currentStep = $this->totalStep;
        }
    }
    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }
    public function validateData()
    {
        if($this->currentStep == 1)
        {
            $this->validate([

                'name'=>'string|required',
                'username'=>'string|required',
                'telephone'=>'required|numeric|min:9',
                'adresse'=>'string|required',
                'email'=>'required|email',
                // 'email'=>'required|email|unique:employes',
                'naissance'=>'required',
                'lieu_naissance'=>'string|required',
                'sexe'=>'required',
                'matrimonial'=>'required',
                'nbr_enfant'=>'integer|required',
                // 'imagephoto'=>'required|mimes:png,jpeg,jpg|max:1024',
            ]);
        }
        elseif ($this->currentStep == 2) {
            $this->validate([
                'id_domaine_etude'=>'required',
                'id_dernier_diplome'=>'required',
                'id_niveau_etude'=>'required',
                // 'imagecv'=>'required',
                // 'imagediplome'=>'required',
            ]);
        }
        elseif ($this->currentStep == 3) {
            $this->validate([
                'id_direction'=>'required',
                'id_poste'=>'required',
                // 'id_dernier_contrat'=>'required',

            ]);
        }


    }
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

        return view('livewire.edit-employe',[
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
    public function update(Employe $employe)
    {
        $inf_employe = Employe::findOrFail($this->employe);

        $this->validate([
            'id_dernier_contrat'=>'required',
            // 'imagecontrat'=>'required',
          ]);
          try{

            DB::beginTransaction();
            $currentday =(int) Carbon::now()->format('Y');
            $dateanniv = (int) Carbon::parse($this->naissance)->format('Y');

                $inf_employe->nom = $this->name;
                $inf_employe->prenom = $this->username;
                $inf_employe->telephone = $this->telephone;
                $inf_employe->adresse = $this->adresse;
                $inf_employe->email = $this->email;
                $inf_employe->date_naissance = $this->naissance;
                $inf_employe->age = $currentday - $dateanniv;
                $inf_employe->lieu_naissance = $this->lieu_naissance;
                $inf_employe->id_genre = $this->sexe;
                $inf_employe->id_matrimonial = $this->matrimonial;
                $inf_employe->nbr_enfant = $this->nbr_enfant;
                $inf_employe->id_domaine = $this->id_domaine_etude;
                $inf_employe->id_niveau_etude = $this->id_niveau_etude;
                $inf_employe->id_diplome = $this->id_dernier_diplome;
                $inf_employe->id_contrat = $this->id_dernier_contrat;
                $inf_employe->id_direction = $this->id_direction;
                $inf_employe->id_service = $this->id_service;
                $inf_employe->id_bureau = $this->id_bureau;
                $inf_employe->id_antenne= $this->id_antenne;
                $inf_employe->id_poste= $this->id_poste;

                // dd($inf_employe);
                $employe = $inf_employe->update();

            // $this->handleImagePhotoUpload($employe,$this->imagephoto,'CloudImage/Employe','id_cloud_file_photo');
            // $this->handleImageCVUpload($employe,$this->imagecv,'CloudImageCV/Employe','id_cloud_file_cv');
            // $this->handleImageDiplomeUpload($employe,$this->imagediplome,'CloudImageDiplome/Employe','id_cloud_file_diplome');
            // $this->handleImageContratUpload($employe,$this->imagecontrat,'CloudImageContrat/Employe','id_cloud_file_contrat');
            // $this->handleImageExtraitUpload($employe,$this->imageextrait,'CloudImageExtrait/Employe','id_cloud_file_extrait');

            // dd($employe);
            if($employe){
                toastr()->success('Le dossier de l\'employé a été modifié avec succes');
                return redirect()->route('employe.liste');
                DB::commit();
            }

    } catch (Exception $th) {
        DB::rollback();
        throw new Exception("Erreur inattendue survenue lors de l'enregistrement", 1);

    }
    }
    // public function handleImagePhotoUpload($data, $imagephoto, $destination, $attributeName)
    // {

    //    if($this->imagephoto)
    //     {
    //         $image = $this->imagephoto;

    //         // $imagename = time().' '.$image->getClientOriginalExtension();

    //         // //Chemin vers le fichier
    //         $filePath = $image->store($destination,'public');

    //         $cloudfile = CloudFilePhoto::create([
    //             'photo_employe'=> $filePath,
    //         ]);

    //         $data->{$attributeName} = $cloudfile->id;

    //         $data->update();

    //     }
    // }
    // public function handleImageCVUpload($data, $imagecv, $destination2, $attributeName2)
    // {

    //    if($this->imagecv)
    //     {
    //         $image = $this->imagecv;

    //         // $imagename = 'CV_'.$this->username->getClientOriginalExtension();

    //         // //Chemin vers le fichier

    //         $filePath = $image->store($destination2,'public');

    //         // $filePath = $image->store($destination2,'public');

    //         $cloudfile = CloudFileCv::create([
    //             'image_cv'=> $filePath,
    //         ]);

    //         $data->{$attributeName2} = $cloudfile->id;

    //         $data->update();
    //     }
    // }
    // public function handleImageDiplomeUpload($data, $imagediplome, $destination3, $attributeName3)
    // {

    //    if($this->imagediplome)
    //     {
    //         $image = $this->imagediplome;

    //         // $imagename = time().' '.$image->getClientOriginalExtension();

    //         // //Chemin vers le fichier
    //         $filePath = $image->store($destination3,'public');

    //         $cloudfile = CloudFileDiplome::create([
    //             'image_diplome'=> $filePath,
    //         ]);

    //         $data->{$attributeName3} = $cloudfile->id;

    //         $data->update();

    //     }
    // }
    // public function handleImageContratUpload($data, $imagecontrat, $destination4, $attributeName4)
    // {

    //     if($this->imagecontrat)
    //     {
    //         $image = $this->imagecontrat;

    //         // //Chemin vers le fichier
    //         $filePath = $image->store($destination4,'public');

    //         $cloudfile = CloudFileContrat::create([
    //             'image_contrat'=> $filePath,
    //         ]);

    //         $data->{$attributeName4} = $cloudfile->id;

    //         $data->update();

    //     }
    // }
    // public function handleImageExtraitUpload($data, $imageextrait, $destination5, $attributeName5)
    // {

    //    if($this->imageextrait)
    //     {
    //         $image = $this->imageextrait;

    //         // $imagename = time().' '.$image->getClientOriginalExtension();

    //         // //Chemin vers le fichier
    //         foreach ($this->imageextrait as $image) {

    //             $filePath = $image->store($destination5,'public');
    //         }

    //         $cloudfile = CloudFileExtrait::create([
    //             'image_extrait'=> $filePath,
    //         ]);

    //         $data->{$attributeName5} = $cloudfile->id;

    //         $data->update();
    //         // dd($data);
    //     }
    // }
}
