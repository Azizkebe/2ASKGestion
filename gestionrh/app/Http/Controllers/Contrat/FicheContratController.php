<?php

namespace App\Http\Controllers\Contrat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FicheContrat;
use App\Models\PermissionRoleModel;
use Auth;

use App\Http\Requests\FicheContratRequest;

class FicheContratController extends Controller
{
    public function create()
    {
        return view('fichecontrat.create');
    }
    public function liste()
    {
        $permissionContrat = PermissionRoleModel::getPermission('Contrat', Auth::user()->role_id);
        if(empty($permissionContrat))
        {
            abort('404');
        }

        $PermissionAdd = PermissionRoleModel::getPermission('Ajouter Contrat', Auth::user()->role_id);
        $PermissionEdit = PermissionRoleModel::getPermission('Editer Contrat', Auth::user()->role_id);
        $PermissionDel = PermissionRoleModel::getPermission('Supprimer Contrat', Auth::user()->role_id);

        $fichecontrat = FicheContrat::all();

        return view('fichecontrat.liste',[
            'fichecontrat'=>$fichecontrat,
            'PermissionAdd'=> $PermissionAdd,
            'PermissionEdit'=> $PermissionEdit,
            'PermissionDel'=> $PermissionDel,
        ]);
    }
    public function edit($fichecontrat)
    {
        return view('fichecontrat.edit', compact('fichecontrat'));
    }
     public function delete($fichecontrat)
    {

        // dd($fichecontrat);
        $fiche = FicheContrat::findOrFail($fichecontrat);

        $fiche->delete();

        toastr()->success('La fiche de contrat a été retirée avec succes');
        return redirect()->back();
    }

}
