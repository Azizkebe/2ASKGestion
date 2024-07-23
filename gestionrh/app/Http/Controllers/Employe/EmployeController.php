<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\CloudFilePhoto;
use App\Models\CloudFileCv;
use App\Models\CloudFileDiplome;



class EmployeController extends Controller
{
    public $employe_info;
    public $timestamps = false;

    public function create()
    {
        return view('employe.create');
    }
    public function liste()
    {
        $employe = Employe::with(['genre','matrimonial','domaine','niveauetude',
        'diplome','contrat','direction','service','antenne','bureau','poste',
        'photo','photocontrat','photodiplome','photoextrait','photocv'])->get();

        return view('employe.liste',[
            'employe'=>$employe
        ]);
    }
    public function detail($employe)
    {
        $employe = Employe::with(['genre','matrimonial','domaine','niveauetude',
        'diplome','contrat','direction','service','antenne','bureau','poste',
        'photo','photocontrat','photodiplome','photoextrait','photocv'])->findOrFail($employe);

        return view('employe.detail', compact('employe'));
    }
    public function editer($employe)
    {
        return view('employe.edit', compact('employe'));
    }

    public function delete_cv_employe(int $employe)
    {
        $deleteImage = CloudFileCv::findOrFail($employe);

        $Employedata = Employe::findOrFail($employe);

        if($deleteImage->image_cv) {

            $deleteImage->delete();

            if(!$deleteImage->image_cv)
            {
                $Employedata->update(['id_cloud_file_cv'=>NULL]);
            }

            toastr()->success('Le CV a été supprimé avec succes');
            return redirect()->back();

        }

    }
    public function delete_diplome_employe(int $employe)
    {
        $deleteImage = CloudFileDiplome::findOrFail($employe);

        $Employedata = Employe::findOrFail($employe);

        if($deleteImage->image_diplome) {

            $deleteImage->delete();

            if(!$deleteImage->image_diplome)
            {
                $Employedata->update(['id_cloud_file_diplome'=>NULL]);
            }

            // dd($Employedata);

            toastr()->success('Le diplome a été supprimé avec succes');
            return redirect()->back();

        }

    }
    public function delete_photo_employe(int $employe)
    {
        $deleteImage = CloudFilePhoto::findOrFail($employe);

        $Employedata = Employe::findOrFail($employe);

        if($deleteImage->photo_employe) {

            $deleteImage->delete();

            if(!$deleteImage->photo_employe)
            {
                $Employedata->update(['id_cloud_file_photo'=>NULL]);
            }

            // dd($Employedata);

            toastr()->success('La photo a été supprimée avec succes');
            return redirect()->back();

        }

    }
}
