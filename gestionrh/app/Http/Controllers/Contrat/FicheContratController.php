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
    public function liste()
    {
        $fichecontrat = FicheContrat::all();


        return view('fichecontrat.liste',[
            'fichecontrat'=>$fichecontrat,
        ]);
    }
    public function edit($fichecontrat)
    {
        return view('fichecontrat.edit', compact('fichecontrat'));
    }
}
