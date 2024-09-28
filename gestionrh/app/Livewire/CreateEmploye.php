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

public $name, $username, $email, $naissance, $age, $lieu_naissance = '';
public $sexe, $matrimonial, $nbr_enfant, $id_domaine_etude, $id_niveau_etude, $id_dernier_diplome = '';
public $id_dernier_contrat, $id_direction, $id_service, $id_bureau, $id_poste, $id_antenne, $imagephoto, $imagecv = '';
public $imagediplome, $imagecontrat = '';
public $imageextrait = [];
public $totalStep = 3;
public $currentStep = 1;
public $telephone, $adresse;


    public function mount()
    {
        $this->currentStep = 1;
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
                'email'=>'required|email|unique:employes',
                'naissance'=>'required',
                'lieu_naissance'=>'string|required',
                'age'=>'integer|required',
                'sexe'=>'required',
                'matrimonial'=>'required',
                'nbr_enfant'=>'integer|required',
                'imagephoto'=>'required|mimes:png,jpeg,jpg|max:1024',
            ]);
        }
        elseif ($this->currentStep == 2) {
            $this->validate([
                'id_domaine_etude'=>'required',
                'id_niveau_etude'=>'required',

            ]);
        }
        elseif ($this->currentStep == 3) {
            $this->validate([
                'id_direction'=>'required',
                'id_poste'=>'required',
            ]);
        }


    }

    public function render()
    {

        $genre = Genre::all();
        $matri = Matrimonial::all();
        $domaine = Domaine::all();
        $niveau = NiveauEtude::all();
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
            // 'diplome'=>$diplome,
            // 'contrat'=>$contrat,
            'direction'=>$direction,
            'service'=>$service,
            'antenne'=>$antenne,
            'bureau'=>$bureau,
            'poste'=>$poste,

        ]);
    }
    public function store()
    {
            //   $this->validate([
            //     'id_dernier_contrat'=>'required',
            //     // 'imagecontrat'=>'required',
            //   ]);
              try{

                DB::beginTransaction();
                $currentday =(int) Carbon::now()->format('Y');
                $dateanniv = (int) Carbon::parse($this->naissance)->format('Y');
                $docData = [
                    'nom'=> $this->name,
                    'prenom'=> $this->username,
                    'telephone'=> $this->telephone,
                    'adresse'=> $this->adresse,
                    'email'=> $this->email,
                    'date_naissance' => $this->naissance,
                    'age'=> $currentday - $dateanniv,
                    'lieu_naissance'=> $this->lieu_naissance,
                    'id_genre'=> $this->sexe,
                    'id_matrimonial'=> $this->matrimonial,
                    'nbr_enfant'=> $this->nbr_enfant,
                    'id_domaine'=> $this->id_domaine_etude,
                    'id_niveau_etude'=> $this->id_niveau_etude,
                    'id_direction'=> $this->id_direction,
                    'id_service'=> $this->id_service,
                    'id_bureau'=> $this->id_bureau,
                    'id_antenne'=> $this->id_antenne,
                    'id_poste'=> $this->id_poste,
                    // 'nombre_jour_permission' => 3,
                ];

                // dd($docData);
                $employe = Employe::create($docData);
                $this->handleImagePhotoUpload($employe,$this->imagephoto,'CloudImage/Employe','id_cloud_file_photo');

                toastr()->success('Le dossier de l\'employé a été enregistré avec succes');
                return redirect()->route('employe.liste');
                DB::commit();


        } catch (Exception $th) {
            DB::rollback();
            throw new Exception("Erreur inattendue survenue lors de l'enregistrement", 1);

        }
    }

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

    public function editer(Employe $employe)
    {

        return view('employe.edit', compact('employe'));
    }

}
