<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\PermissionRoleModel;
use Auth;

class CurriculumController extends Controller
{
    public function create()
    {
        return view('curriculum.create');
    }
    public function liste()
    {
        $permissionCV = PermissionRoleModel::getPermission('CV', Auth::user()->role_id);
        if(empty($permissionCV))
        {
            abort('404');
        }

        $PermissionAdd = PermissionRoleModel::getPermission('Ajouter CV', Auth::user()->role_id);
        $PermissionEdit = PermissionRoleModel::getPermission('Editer CV', Auth::user()->role_id);
        $PermissionDel = PermissionRoleModel::getPermission('Supprimer CV', Auth::user()->role_id);

        $curriculum = Curriculum::with('employe')->get();

        return view('curriculum.liste',[
            'cv'=>$curriculum,
            'PermissionAdd'=> $PermissionAdd,
            'PermissionEdit'=> $PermissionEdit,
            'PermissionDel'=> $PermissionDel,
        ]);

    }
    public function edit($curricula)
    {
        return view('curriculum.edit', compact('curricula'));
    }
    public function delete($curricula)
    {
        $cv = Curriculum::findorFail($curricula);

        $cv->delete();

        toastr()->success('Le CV a été supprimé avec succes');

        return redirect()->back();
    }
}
