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
public $employe, $info_employe;


    public function mount(Employe $employe)
    {
        $this->currentStep = 1;
        $this->info_employe = Employe::with(['genre','matrimonial','domaine','niveauetude',
        'diplome','contrat','direction','service','antenne','bureau','poste',
        'photo','photocontrat','photodiplome','photoextrait','photocv'])->findOrFail($this->employe);
        // dd($info_employe);
        $this->name =  $this->info_employe->nom;
        $this->username =  $this->info_employe->prenom;
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
                'email'=>'required|email|unique:employes',
                'naissance'=>'required',
                'lieu_naissance'=>'string|required',
                'sexe'=>'required',
                'matrimonial'=>'required',
                'nbr_enfant'=>'integer|required',
                'imagephoto'=>'required|mimes:png,jpeg,jpg|max:1024',
            ]);
        }
        elseif ($this->currentStep == 2) {
            $this->validate([
                'id_domaine_etude'=>'required',
                'id_dernier_diplome'=>'required',
                'id_niveau_etude'=>'required',
                'imagecv'=>'required',
                'imagediplome'=>'required',
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
}
