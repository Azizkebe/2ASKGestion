<?php

namespace App\Http\Controllers\Demande;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DemandePermission;

class DemandePermissionController extends Controller
{

    public function create()
    {
        return view('demande.create');
    }
    public function liste()
    {
        $listepermissiondemande = DemandePermission::all();

        return view('demande.liste', compact('listepermissiondemande'));
    }
    public function edit($demandepermission)
    {
        return view('demande.edit', compact('demandepermission'));
    }
}
