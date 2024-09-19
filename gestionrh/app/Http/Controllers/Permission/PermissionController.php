<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\PermissionRoleModel;
use Auth;

class PermissionController extends Controller
{
    public function create()
    {
        return view('permission.create');
    }
    public function liste()
    {
        $permission_Permission = PermissionRoleModel::getPermission('Permission', Auth::user()->role_id);
        if(empty($permission_Permission))
        {
            abort('404');
        }

        $PermissionAdd = PermissionRoleModel::getPermission('Ajouter Permission', Auth::user()->role_id);
        $PermissionEdit = PermissionRoleModel::getPermission('Editer Permission', Auth::user()->role_id);
        $PermissionDel = PermissionRoleModel::getPermission('Supprimer Permission', Auth::user()->role_id);

        $permission = Permission::with(['employe','statutpermission','imagepermission'])->get();

        return view('permission.liste',[
            'permission'=>$permission,
            'PermissionAdd'=>$PermissionAdd,
            'PermissionEdit'=>$PermissionEdit,
            'PermissionDel'=>$PermissionDel,
        ]);
    }
    public function edit($permission)
    {
        return view('permission.edit', compact('permission'));
    }
}
