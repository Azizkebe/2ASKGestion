<?php

namespace App\Http\Controllers\Demande;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DemandePermission;
use App\Models\PermissionRoleModel;
use Auth;

class DemandePermissionController extends Controller
{

    public function create()
    {
        return view('demande.create');
    }
    public function liste()
    {


        $permissionDemandEmploye = PermissionRoleModel::getPermission('Permission_Employe', Auth::user()->role_id);
        if(empty($permissionDemandEmploye))
        {
            abort('404');
        }

        $permissionDemandAdd = PermissionRoleModel::getPermission('Ajouter Permission_Employe', Auth::user()->role_id);
        $permissionDemandEdit = PermissionRoleModel::getPermission('Editer Permission_Employe', Auth::user()->role_id);
        $permissionDemandDel = PermissionRoleModel::getPermission('Supprimer Permission_Employe', Auth::user()->role_id);


        $listepermissiondemande = DemandePermission::where('email',Auth::user()->email)->get();


        return view('demande.liste', [
            'listepermissiondemande'=>$listepermissiondemande,
            'permissionDemandAdd'=>$permissionDemandAdd,
            'permissionDemandEdit'=>$permissionDemandEdit,
            'permissionDemandDel'=>$permissionDemandDel,
        ]);
    }
    public function edit($demandepermission)
    {
        return view('demande.edit', compact('demandepermission'));
    }
}
