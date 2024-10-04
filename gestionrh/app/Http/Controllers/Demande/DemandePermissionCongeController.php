<?php

namespace App\Http\Controllers\Demande;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemandePermissionCongeController extends Controller
{
    public function create()
    {
        return view('demande_conge.create');
    }
}
