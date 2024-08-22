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
    public function liste()
    {
        $membre = Membre::with(['employe','typemembre'])->get();
        return view('membre.liste',[
            'membre'=>$membre,
        ]);
    }
    public function edit($membres)
    {
        return view('membre.edit', compact('membres'));
    }
    public function delete($membre)
    {
        $membre = Membre::findorFail($membre);

        $membre->delete();

        toastr()->success('Le membre a été supprimé avec succes');

        return redirect()->back();
    }
}
