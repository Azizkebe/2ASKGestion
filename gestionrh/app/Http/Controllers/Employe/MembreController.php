<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Membre;
use App\Models\TypeMembre;
use App\Models\PermissionRoleModel;
use Auth;

class MembreController extends Controller
{
    public function create()
    {

        return view('membre.create');
    }
    public function liste()
    {
        $permissionMembre = PermissionRoleModel::getPermission('Membre', Auth::user()->role_id);
        if(empty($permissionMembre))
        {
            abort('404');
        }

        $PermissionAdd = PermissionRoleModel::getPermission('Ajouter Membre', Auth::user()->role_id);
        $PermissionEdit = PermissionRoleModel::getPermission('Editer Membre', Auth::user()->role_id);
        $PermissionDel = PermissionRoleModel::getPermission('Supprimer Membre', Auth::user()->role_id);

        $membre = Membre::with(['employe','typemembre'])->get();
        return view('membre.liste',[
            'membre'=>$membre,
        ]);
    }
    public function edit($membres)
    {
        return view('membre.edit', compact('membres'));
    }
    public function delete($membre)
    {
        $membre = Membre::findorFail($membre);

        $membre->delete();

        toastr()->success('Le membre a été supprimé avec succes');

        return redirect()->back();
    }
}
