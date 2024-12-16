<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DirectionRequest;
use App\Models\Direction;
use App\Models\Employe;

class DirectionController extends Controller
{
    public function create()
    {

        $employe = Employe::all();
        return view('direction.create', compact('employe'));
    }
    public function store(DirectionRequest $request, Direction $direction)
    {
        try {
            $direction->direction = $request->direction;
            $direction->id_chef_direction = $request->id_chef_direction;

            $direction->save();

            return redirect()->back()->with('success','La direction a été enregistrée');

        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function liste()
    {
        $direction = Direction::all();

        return view('direction.liste', compact('direction'));

    }
    public function editer($direction)
    {
        $direction = Direction::findOrFail($direction);
        $employe = Employe::all();

        return view('direction.edit', compact('direction','employe'));
    }
    public function update(DirectionRequest $request, $direction)
    {
        try {
            $direction = Direction::findOrFail($direction);

            $direction->direction = $request->direction;
            $direction->id_chef_direction = $request->id_chef_direction;

            $direction->update();

            return redirect()->route('direction.liste')->with('success', 'La direction est mise à jour');
        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de la mise à jour", 1);

        }
    }
    public function delete($direction)
    {
        $direction = Direction::findOrFail($direction);

        $direction->delete();

        return redirect()->back()->with('success','La direction a été retirée avec succes');
    }
}
