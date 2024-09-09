<?php

namespace App\Http\Controllers\Conge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ParamTypeCongeRequest;
use App\Models\ParamTypeConge;
use App\Models\YearTable;

class CongeController extends Controller
{
    public function create()
    {
        return view('conge.create');
    }

    public function store(ParamTypeCongeRequest $request, ParamTypeConge $param)
    {
        try {

            $year_active = YearTable::where('active','1')->first();

            if($year_active)
            {
                $param->type_de_conge = $request->type_de_conge;
                $param->nombre_de_jour_reserve = $request->nombre_de_jour_reserve;
                $param->id_yeartable = $year_active->id;
                $param->save();

                toastr()->success('le type de congé est ajouté avec succes');

                return redirect()->back();
            }
            else
            {
                toastr()->error('Aucune année n\'est activée');
                return redirect()->back();
            }


        } catch (Exception $th) {

            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function liste()
    {
        $param = ParamTypeConge::with('yeartable')->get();

        return view('conge.liste',[
            'param'=>$param,
        ]);
    }
}
