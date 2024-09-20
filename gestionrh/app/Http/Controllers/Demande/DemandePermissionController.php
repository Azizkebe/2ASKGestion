<?php

namespace App\Http\Controllers\Demande;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemandePermissionController extends Controller
{

    public function create()
    {
        return view('demande.create');
    }
}
