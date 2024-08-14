<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employe;
use App\Models\CloudFilePhoto;
use App\Models\CloudFileDiplome;
use App\Models\CloudFileCv;
use App\Models\CloudFileContrat;
use App\Models\CloudFileExtrait;
use Livewire\WithFileUploads;

class DossierEmploye extends Component
{
    use WithFileUploads;
    public $employe, $imagefile, $filediplome, $filecv, $filecontrat, $fileextrait;

    public $inputs, $i, $files_contrat = [];

    public function mount()
    {
        $this->inputs = [];

        $this->i = 1;

    }
    public function add($i)
    {
        $this->i = $i + 1;
        array_push($this->inputs, $i);

    }
    public function remove($key)
    {
        unset($this->inputs[$key]);
    }
    public function render()
    {

        $employes = Employe::findOrFail($this->employe);
        return view('livewire.dossier-employe', compact('employes'));
    }
    public function updatephotoprofil(Employe $employe)
    {
        $info_employe = Employe::findOrFail($this->employe);
        if($info_employe->id_cloud_file_photo != NULL)
        {
            toastr()->error('Pour mettre à jour la photo, vous devez d\'abord supprimer la photo existante et joindre une autre');
            return redirect()->back();
        }
        else{
              if(isset($this->imagefile))
              {
                $filePath = $this->imagefile->storePublicly('CloudImage/Employe','public');
                $cloudfile = CloudFilePhoto::create([
                    'photo_employe'=> $filePath,
                ]);

                $info_employe->update(['id_cloud_file_photo'=>$cloudfile->id]);

                toastr()->success('La photo de l\'employe a été bien modifiée');

                return redirect()->back();
              }


              else
              {
                toastr()->error('Erreur: Veuillez charger une image');

                return redirect()->back();
              }

        }
    }
    public function update_diplome(Employe $employe)
    {
        $info_employe = Employe::findOrFail($this->employe);

        if($info_employe->id_cloud_file_diplome != NULL)
        {
            toastr()->error('Pour mettre à jour le diplome, vous devez d\'abord supprimer le diplome existant et joindre un autre');
            return redirect()->back();
        }
        else{
              if(isset($this->filediplome))
              {
                $filePath = $this->filediplome->storePublicly('CloudImageDiplome/Employe','public');
                $cloudfile = CloudFileDiplome::create([
                    'image_diplome'=> $filePath,
                ]);

                $info_employe->update(['id_cloud_file_diplome'=>$cloudfile->id]);

                toastr()->success('Le diplome de l\'employe a été bien modifié');

                return redirect()->back();
              }


              else
              {
                toastr()->error('Erreur: Veuillez charger un diplome');

                return redirect()->back();
              }

        }
    }
    public function update_cv(Employe $employe)
    {
        $info_employe = Employe::findOrFail($this->employe);

        if($info_employe->id_cloud_file_cv != NULL)
        {
            toastr()->error('Pour mettre à jour le cv, vous devez d\'abord supprimer le cv existant et joindre un autre');
            return redirect()->back();
        }
        else{
              if(isset($this->filecv))
              {
                $filePath = $this->filecv->storePublicly('CloudImageCV/Employe','public');
                $cloudfile = CloudFileCv::create([
                    'image_cv'=> $filePath,
                ]);

                $info_employe->update(['id_cloud_file_cv'=>$cloudfile->id]);

                toastr()->success('Le cv de l\'employe a été bien modifié');

                return redirect()->back();
              }


              else
              {
                toastr()->error('Erreur: Veuillez charger un cv');

                return redirect()->back();
              }

        }
    }
    public function update_contrat()
    {

        $response = [];
        foreach ($this->files_contrat as $file) {


            $fileName = time(). '.' .$file->extension();

            $filePath = $file->storeAs('CloudImageContrat/Employe', $fileName, 'public' );

            $response[] = [
                'image_contrat'=> $filePath,
            ];

        }
        dd($response);
        // CloudFileContrat::insert($response);

        // $info_employe->update(['id_cloud_file_contrat'=>$cloudfile->id]);

        // toastr()->success('Le contrat de l\'employe a été bien modifié');

        // return redirect()->back();
        // dd( $response );
        // for($x = 0; $x < count($response); $x++)
        // {
        //     dd(count($response));
        //     $cloudfile = CloudFileContrat::create([
        //         'image_contrat'=> $response[$x],
        //         ]);
        //     dd($cloudfile);
        // }

        // $info_employe = Employe::findOrFail($this->employe);

        // if($info_employe->id_cloud_file_contrat != NULL)
        // {
        //     toastr()->error('Pour mettre à jour le contrat, vous devez d\'abord supprimer le contrat existant et joindre un autre');
        //     return redirect()->back();
        // }
        // else{
        //       if(isset($this->filecontrat))
        //       {
        //         $filePath = $this->filecontrat->storePublicly('CloudImageContrat/Employe','public');
        //         $cloudfile = CloudFileContrat::create([
        //             'image_contrat'=> $filePath,
        //         ]);

        //         $info_employe->update(['id_cloud_file_contrat'=>$cloudfile->id]);

        //         toastr()->success('Le contrat de l\'employe a été bien modifié');

        //         return redirect()->back();
        //       }


        //       else
        //       {
        //         toastr()->error('Erreur: Veuillez charger une copie du contrat');

        //         return redirect()->back();
        //       }

        // }
    }
    public function update_extrait(Employe $employe)
    {
        $info_employe = Employe::findOrFail($this->employe);

        if($info_employe->id_cloud_file_extrait != NULL)
        {
            toastr()->error('Pour mettre à jour l\'extrait, vous devez d\'abord supprimer l\'extrait existant et joindre un autre');
            return redirect()->back();
        }
        else{
              if(isset($this->fileextrait))
              {
                $filePath = $this->fileextrait->storePublicly('CloudImageExtrait/Employe','public');
                $cloudfile = CloudFileExtrait::create([
                    'image_extrait'=> $filePath,
                ]);

                $info_employe->update(['id_cloud_file_extrait'=>$cloudfile->id]);

                toastr()->success('L\'extrait de l\'employe a été bien modifié');

                return redirect()->back();
              }

              else
              {
                toastr()->error('Erreur: Veuillez charger une copie de l\'extrait');

                return redirect()->back();
              }

        }
    }
}
