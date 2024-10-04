<?php

namespace App\Http\Controllers\Annee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YearTable;
use App\Models\PermissionRoleModel;
use Auth;


class YearController extends Controller
{
    public function create()
    {
        return view('year.create');
    }
    public function liste()
    {
       $permissionConfiguration = PermissionRoleModel::getPermission('Configuration', Auth::user()->role_id);

       if(empty($permissionConfiguration))
       {
        abort('404');
       }
        return view('year.liste');
    }

}
