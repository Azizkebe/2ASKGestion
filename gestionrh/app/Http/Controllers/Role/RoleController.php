<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleModel;
use App\Models\PermissionModel;
use App\Models\PermissionRoleModel;
use App\Http\Requests\RoleRequest;
use Auth;

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

        return view('role.create', compact('result'));
    }
    public function store(RoleRequest $request, RoleModel $role)
    {
        try {

            $role->name = $request->nom;
            $role->save();

            PermissionRoleModel::InsertUpdatedRecord($request->permission_id, $role->id);


            toastr()->success('le role a été ajouté avec succes');
            return redirect()->route('role.liste');
        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function liste()
    {
        $permissionRole = PermissionRoleModel::getPermission('Role', Auth::user()->role_id);
        if(empty($permissionRole))
        {
            abort('404');
        }

        $data['PermissionAdd'] = PermissionRoleModel::getPermission('Ajouter Role', Auth::user()->role_id);
        $data['PermissionEdit'] = PermissionRoleModel::getPermission('Editer Role', Auth::user()->role_id);
        $data['PermissionDel'] = PermissionRoleModel::getPermission('Delete Role', Auth::user()->role_id);


        $data['getRecord'] = RoleModel::getRecordRole();

        // dd($data);
        return view('role.liste', $data);

        // $role = RoleModel::all();
        // return view('role.liste', compact('role'));

    }
    public function editer($role)
    {
        // $getPermission = PermissionModel::groupBy('groupby')->get();
        // $result = [];
        // foreach($getPermission as $value)
        // {
        //     $getPermissionGroup = PermissionModel::where('groupby',$value->groupby)->get();
        //     $data = [];
        //     $data['id'] = $value->id;
        //     $data['name'] = $value->name;
        //     $group = [];
        //     foreach($getPermissionGroup as $valueG)
        //     {
        //         $dataG = [];
        //         $dataG['id'] = $valueG->id;
        //         $dataG['name'] = $valueG->name;
        //         $group[] = $dataG;
        //     }
        //     $data['group'] = $group;
        //     $result[] = $data;
        // }

        // $role = RoleModel::findOrFail($role);
        // $getRolePermission = PermissionRoleModel::where('role_id', $role->id)->get();

        // return view('role.edit',[
        //     'role'=>$role,
        //     'result'=>$result,
        //     'getRolePermission' => $getRolePermission,
        // ]);
        $data['getRecord'] = RoleModel::getSingle($role);
        $data['getPermission'] = PermissionModel::getRecord();
        $data['getRolePermission'] = PermissionRoleModel::getRolePermission($role);

        return view('role.edit', $data);

    }
    public function update(Request $request, $role)
    {
        // dd($request->all());
        $role = RoleModel::getSingle($role);

        $role->name = $request->nom;

        $role->update();
        PermissionRoleModel::InsertUpdatedRecord($request->permission_id, $role->id);

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
