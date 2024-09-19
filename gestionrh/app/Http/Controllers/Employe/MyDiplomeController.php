<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MyDiplome;
use App\Models\PermissionRoleModel;
use Auth;


class MyDiplomeController extends Controller
{
    public function create()
    {
        return view('mydiplome.create');
    }
    public function liste()
    {
        $permissionDiplome = PermissionRoleModel::getPermission('Diplome', Auth::user()->role_id);
        if(empty($permissionDiplome))
        {
            abort('404');
        }

        $PermissionAdd = PermissionRoleModel::getPermission('Ajouter Diplome', Auth::user()->role_id);
        $PermissionEdit = PermissionRoleModel::getPermission('Editer Diplome', Auth::user()->role_id);
        $PermissionDel = PermissionRoleModel::getPermission('Supprimer Diplome', Auth::user()->role_id);

        $mydiplome = MyDiplome::with(['employe','typediplome'])->get();
        return view('mydiplome.liste',[
            'mydiplome'=>$mydiplome,
            'PermissionAdd'=>$PermissionAdd,
            'PermissionEdit'=>$PermissionEdit,
            'PermissionDel'=>$PermissionDel,

        ]);
    }
    public function edit($mydiplome)
    {
        return view('mydiplome.edit', compact('mydiplome'));
    }
    public function delete($mydiplome)
    {
        $diplome = MyDiplome::findorFail($mydiplome);

        $diplome->delete();

        toastr()->success('Le diplome a été supprimé avec succes');

        return redirect()->back();
    }
}
