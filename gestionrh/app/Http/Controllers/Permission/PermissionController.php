<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function create()
    {
        return view('permission.create');
    }
    public function liste()
    {
        $permission = Permission::with(['employe','statutpermission','imagepermission'])->get();

        return view('permission.liste', compact('permission'));
    }
    public function edit($permission)
    {
        return view('permission.edit', compact('permission'));
    }
}
