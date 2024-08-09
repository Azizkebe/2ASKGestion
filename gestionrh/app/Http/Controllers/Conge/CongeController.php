<?php

namespace App\Http\Controllers\Conge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ParamTypeCongeRequest;
use App\Models\ParamTypeConge;

class CongeController extends Controller
{
    public function create()
    {
        return view('conge.create');
    }

    public function store(ParamTypeCongeRequest $request, ParamTypeConge $param)
    {
        try {
            $param->type_de_conge = $request->type_de_conge;
            $param->nombre_de_jour_reserve = $request->nombre_de_jour_reserve;

            // dd($param);

            $param->save();

            toastr()->success('le type de congé est ajouté avec succes');

            return redirect()->back();

        } catch (Exception $th) {

            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function liste()
    {
        $param = ParamTypeConge::all();

        return view('conge.liste',[
            'param'=>$param,
        ]);
    }
}
