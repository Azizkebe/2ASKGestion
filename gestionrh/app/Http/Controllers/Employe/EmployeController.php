<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\CloudFilePhoto;



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
    public function delete_photo_employe(int $employe)
    {
        $photo_employe = CloudFilePhoto::findOrFail($employe);

        $delete_photo = $photo_employe->delete();

        if($delete_photo)
        {
            $this->employe_info = Employe::findOrFail($employe);

            $this->employe_info->update(['id_cloud_file_photo '=> NULL]);

        }

        toastr()->success('La photo a été supprimée avec succes');
        return redirect()->back();


    }
}
