<?php

namespace App\Http\Controllers\Contrat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FicheContrat;

use App\Http\Requests\FicheContratRequest;

class FicheContratController extends Controller
{
    public function create()
    {
        return view('fichecontrat.create');
    }
}
