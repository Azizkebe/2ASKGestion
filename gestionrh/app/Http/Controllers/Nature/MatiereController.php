<?php

namespace App\Http\Controllers\Nature;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MatiereRequest;
use App\Models\Matiere;

class MatiereController extends Controller
{
    public function liste()
    {
        $matiere = Matiere::all();
        return view('matiere.liste', compact('matiere'));
    }
    public function create()
    {
        return view('matiere.create');
    }
    public function store(MatiereRequest $request, Matiere $matiere)
    {
        $matiere->nature = $request->nature;

        $matiere->save();

        toastr()->success('La matiere a été ajoutée avec succes');
        return redirect()->back();
    }
}
