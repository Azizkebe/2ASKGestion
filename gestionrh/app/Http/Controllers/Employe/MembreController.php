<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Membre;
use App\Models\TypeMembre;

class MembreController extends Controller
{
    public function create()
    {

        return view('membre.create');
    }
}
