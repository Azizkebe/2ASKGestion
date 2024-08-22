<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curriculum;

class CurriculumController extends Controller
{
    public function create()
    {
        return view('curriculum.create');
    }
    public function liste()
    {
        $curriculum = Curriculum::with('employe')->get();

        return view('curriculum.liste',[
            'cv'=>$curriculum,
        ]);

    }
    public function edit($curricula)
    {
        return view('curriculum.edit', compact('curricula'));
    }
    public function delete($curricula)
    {
        $cv = Curriculum::findorFail($curricula);

        $cv->delete();

        toastr()->success('Le CV a été supprimé avec succes');

        return redirect()->back();
    }
}
