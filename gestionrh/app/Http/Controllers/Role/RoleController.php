<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleModel;
use App\Models\PermissionModel;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    public function create()
    {
        $getPermission = PermissionModel::groupBy('groupby')->get();
        $result = [];
        foreach($getPermission as $value)
        {
            $getPermissionGroup = PermissionModel::where('groupby',$value->groupby)->get();
            $data = [];
            $data['id'] = $value->id;
            $data['name'] = $value->name;
            $group = [];
            foreach($getPermissionGroup as $valueG)
            {
                $dataG = [];
                $dataG['id'] = $valueG->id;
                $dataG['name'] = $valueG->name;
                $group[] = $dataG;
            }
            $data['group'] = $group;
            $result[] = $data;
        }
        // dd($result);
        return view('role.create', compact('result'));
    }
    public function store(RoleRequest $request, RoleModel $role)
    {
        try {
            $role->name = $request->nom;
            $role->save();

            toastr()->success('le role a été ajouté avec succes');
            return redirect()->route('role.liste');
        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function liste()
    {
        $role = RoleModel::all();
        return view('role.liste', compact('role'));
    }
    public function editer($role)
    {
        $role = RoleModel::findOrFail($role);

        return view('role.edit',compact('role'));
    }
    public function update(RoleRequest $request, $role)
    {
        $role = RoleModel::findOrFail($role);

        $role->name = $request->nom;

        $role->update();

        toastr()->success('La modification est effectuée avec succes');
        return redirect()->route('role.liste');
    }
    public function delete($role)
    {
        $role_delete = RoleModel::findOrFail($role);

        $role_delete->delete();

        toastr()->success('le role a été supprimé avec succes');

        return redirect()->back();
    }
}
