<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MatrimonialRequest;
use App\Models\Matrimonial;

class MatrimonialController extends Controller
{
    public function create()
    {
        return view('matrimonial.create');
    }
    public function store(MatrimonialRequest $request, Matrimonial $mat)
    {
        try {
            $mat->situation_matrimoniale = $request->matrimonial;

            // dd($request);

            $mat->save();

            return redirect()->back()->with('success','La situation a été enregistrée');

        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function liste()
    {
        $mat = Matrimonial::all();

        return view('matrimonial.liste', compact('mat'));

    }
    public function editer($matrimonial)
    {
        $mat = Matrimonial::findOrFail($matrimonial);

        return view('matrimonial.edit', compact('mat'));
    }
    public function update(MatrimonialRequest $request, $matrimonial)
    {
        try {
            $mat = Matrimonial::findOrFail($matrimonial);

            $mat->situation_matrimoniale = $request->matrimonial;

            $mat->update();

            return redirect()->route('matrimonial.liste')->with('success', 'La situation est mise à jour');
        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de la mise à jour", 1);

        }
    }
    public function delete($matrimonial)
    {
        $mat = Matrimonial::findOrFail($matrimonial);

        $mat->delete();

        return redirect()->back()->with('success','La situation matrimoniale a été enlevé avec succes');
    }
}
