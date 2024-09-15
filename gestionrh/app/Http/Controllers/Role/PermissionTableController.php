<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionRoleRequest;
use App\Models\PermissionModel;

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

    }
}
