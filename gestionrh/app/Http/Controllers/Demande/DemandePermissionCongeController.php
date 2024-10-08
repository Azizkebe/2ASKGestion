<?php

namespace App\Http\Controllers\Demande;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DemandeConge;

class DemandePermissionCongeController extends Controller
{
    public function create()
    {
        return view('demande_conge.create');
    }
    public function liste()
    {
        $demande_conge = DemandeConge::all();
        return view('demande_conge.liste', compact('demande_conge'));
    }
    public function edit($demande_conge)
    {
        return view('demande_conge.edit', compact('demande_conge'));
    }
}
