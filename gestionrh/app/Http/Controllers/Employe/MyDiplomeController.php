<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MyDiplome;


class MyDiplomeController extends Controller
{
    public function create()
    {
        return view('mydiplome.create');
    }
    public function liste()
    {
        $mydiplome = MyDiplome::with(['employe','typediplome'])->get();
        return view('mydiplome.liste',[
            'mydiplome'=>$mydiplome,
        ]);
    }
    public function edit($mydiplome)
    {
        return view('mydiplome.edit', compact('mydiplome'));
    }
    public function delete($mydiplome)
    {
        $diplome = MyDiplome::findorFail($mydiplome);

        $diplome->delete();

        toastr()->success('Le diplome a été supprimé avec succes');

        return redirect()->back();
    }
}
