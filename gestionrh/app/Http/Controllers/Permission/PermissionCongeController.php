<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermissionConge;
use App\Models\PermissionRoleModel;
use Auth;

class PermissionCongeController extends Controller
{
    public function create()
    {
        return view('permissionconge.create');
    }
    public function liste()
    {
        $permission_conge = PermissionRoleModel::getPermission('Conge', Auth::user()->role_id);
        if(empty($permission_conge))
        {
            abort('404');
        }

        $PermissionAdd = PermissionRoleModel::getPermission('Ajouter Conge', Auth::user()->role_id);
        $PermissionEdit = PermissionRoleModel::getPermission('Editer Conge', Auth::user()->role_id);
        $PermissionDel = PermissionRoleModel::getPermission('Supprimer Conge', Auth::user()->role_id);

        $permissionlisteconge = PermissionConge::with(['employe','imageconge'])->get();

        return view('permissionconge.liste',[
            'permissionlisteconge'=>$permissionlisteconge,
            'PermissionAdd'=>$PermissionAdd,
            'PermissionEdit'=>$PermissionEdit,
            'PermissionDel'=>$PermissionDel,
        ]);
    }
    public function edit($permissionconge)
    {
        return view('permissionconge.edit', compact('permissionconge'));
    }
    public function delete($permissionconge)
    {
        $permission_conge = PermissionConge::findOrFail($permissionconge);

        $permission_conge->delete();

        toastr('le congé a été supprimé avec succes');

        return redirect()->back();
    }
}
