<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionCongeController extends Controller
{
    public function create()
    {
        return view('permissionconge.create');
    }
}
