<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employe;



class EmployeController extends Controller
{
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
}
