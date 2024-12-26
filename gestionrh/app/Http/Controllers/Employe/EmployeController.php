<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\CloudFileContrat;
use App\Models\CloudFilePhoto;
use App\Models\CloudFileDiplome;
use App\Models\CloudFileCV;

class EmployeController extends Controller
{
    public $employe_info;
    public $timestamps = false;

    public function create()
    {
        return view('employe.create');
    }
    public function detail(int $employe)
    {

        return view('employe.details', compact('employe'));
    }
    public function editer($employe)
    {
        return view('employe.edit', compact('employe'));
    }
    public function liste()
    {
        return view('employe.liste');
    }

    public function editer_dossier($employe)
    {
        return view('employe.editer_dossier', compact('employe'));
    }
    public function delete_cv_employe(int $employe)
    {
        $Employedata = Employe::findOrFail($employe);

        $deleteImage = CloudFileCv::findOrFail($Employedata->id_cloud_file_cv);


        if($deleteImage) {

            $deleteImage->delete();

            $Employedata->update(['id_cloud_file_cv'=>NULL]);


            toastr()->success('Le CV a été supprimé avec succes');
            return redirect()->back();

        }

    }
    public function delete_diplome_employe(int $employe)
    {
        $Employedata = Employe::findOrFail($employe);

        $deleteImage = CloudFileDiplome::findOrFail($Employedata->id_cloud_file_diplome);

        if($deleteImage)
        {
            $deleteImage->delete();

            $Employedata->update(['id_cloud_file_diplome'=>NULL]);

             toastr()->success('Le diplome a été supprimé avec succes');
             return redirect()->back();

        }

    }
    public function delete_photo_employe(int $employe)
    {

        $Employedata = Employe::findOrFail($employe);

        $deleteImage = CloudFilePhoto::findOrFail($Employedata->id_cloud_file_photo);

        if($deleteImage)
        {
            $deleteImage->delete();

            $Employedata->update(['id_cloud_file_photo'=>NULL]);

             toastr()->success('La photo a été supprimée avec succes');
             return redirect()->back();

        }
    }
    public function delete_contrat_employe(int $employe)
    {
        $Employedata = Employe::findOrFail($employe);

        $deleteImage = CloudFileContrat::findOrFail($Employedata->id_cloud_file_contrat);

        if($deleteImage)
        {
            $deleteImage->delete();

            $Employedata->update(['id_cloud_file_contrat'=>NULL]);

             toastr()->success('La copie du contrat a été supprimée avec succes');
             return redirect()->back();

        }
    }
    public function delete(int $employe)
    {
        $employedata = Employe::findOrFail($employe);

        if($employedata)
        {
            $employedata->delete();

            toastr()->success('L\'utilisateur a été retiré avec success');
            return redirect()->back();
        }
        else{
            toastr()->error('Erreur survenue lors de la suppression');
            return redirect()->back();
        }


    }
}
