<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermissionConge;

class PermissionCongeController extends Controller
{
    public function create()
    {
        return view('permissionconge.create');
    }
    public function liste()
    {
        $permissionlisteconge = PermissionConge::with(['employe','imageconge'])->get();

        return view('permissionconge.liste', compact('permissionlisteconge'));
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
