<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionRoleRequest;
use App\Models\PermissionModel;
use App\Models\PermissionRoleModel;
use Auth;

class PermissionTableController extends Controller
{
    public function create()
    {
        return view('permissionrole.create');
    }
    public function store(PermissionRoleRequest $request, PermissionModel $permissionrole)
    {
        try {
            $permissionrole->name = $request->nom;
            $permissionrole->slug = $request->slug;
            $permissionrole->groupby = $request->groupby;
            $permissionrole->save();

            toastr()->success('la permission a été ajoutée avec succes');
            // return redirect()->route('permissionrole.liste');
            return redirect()->back();
        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function liste()
    {
        $permissionGroup = PermissionRoleModel::getPermission('Group_Permission', Auth::user()->role_id);
        if(empty($permissionGroup))
        {
            abort('404');
        }

        $PermissionAdd = PermissionRoleModel::getPermission('Ajouter Groupe_Permission', Auth::user()->role_id);
        $PermissionEdit = PermissionRoleModel::getPermission('Editer Groupe_Permission', Auth::user()->role_id);
        $PermissionDel = PermissionRoleModel::getPermission('Supprimer Groupe_Permission', Auth::user()->role_id);

        $permissionliste = PermissionModel::all();

        return view('permissionrole.liste', [
            'permissionliste'=>$permissionliste,
            'PermissionAdd'=>$PermissionAdd,
            'PermissionEdit'=>$PermissionEdit,
            'PermissionDel'=>$PermissionDel,
        ]);
    }
    public function editer($permissionrole)
    {
        $permission_edit = PermissionModel::findOrFail($permissionrole);

        return view('permissionrole.edit', compact('permission_edit'));
    }
    public function update($permissionrole, Request $request)
    {
        $permissionrole = PermissionModel::findOrFail($permissionrole);

        try {
            $permissionrole->name = $request->nom;
            $permissionrole->slug = $request->slug;
            $permissionrole->groupby = $request->groupby;

            // dd($permissionrole);
            $permissionrole->save();

            toastr()->success('la permission a été modifiée avec succes');
            // return redirect()->route('permissionrole.liste');
            return redirect()->route('permissionrole.liste');
        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function delete($permissionrole, )
    {
        $permissionrole = PermissionModel::findOrFail($permissionrole);

        $permissionrole->delete();

        toastr()->success('le groupe de permission a été supprimé avec succes');

        return redirect()->back();


    }
}
