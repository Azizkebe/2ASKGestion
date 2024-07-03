<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AntenneRequest;
use App\Models\Antenne;
use App\Models\Direction;

class AntenneController extends Controller
{
    public function create()
    {
        $direction = Direction::all();
        return view('antenne.create', compact('direction'));
    }
    public function store(AntenneRequest $request, Antenne $antenne)
    {
        try {
            $antenne->id_direction = $request->id_direction;
            $antenne->antenne = $request->antenne;

            $antenne->save();

            return redirect()->back()->with('success','L\'antenne a été enregistrée');

        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function liste()
    {
        $antenne = Antenne::latest()->with('direction')->get();

        return view('antenne.liste', compact('antenne'));

    }
    public function editer($antenne)
    {
        $antenne = Antenne::findOrFail($antenne);
        $direction = Direction::all();

        return view('antenne.edit', [
            'antenne'=>$antenne,
            'direction'=>$direction,
        ]);
    }
    public function update(Request $request, $antenne)
    {
        try {
            $antenne = Antenne::findOrFail($antenne);

            $antenne->antenne = $request->antenne;
            $antenne->id_direction = $request->id_direction;

            $antenne->update();

            return redirect()->route('antenne.liste')->with('success', 'L\'antenne est mise à jour');
        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de la mise à jour", 1);

        }
    }
    public function delete($antenne)
    {
        $antenne = Antenne::findOrFail($antenne);

        $antenne->delete();

        return redirect()->back()->with('success','L\'antenne a été retirée avec succes');
    }
}
