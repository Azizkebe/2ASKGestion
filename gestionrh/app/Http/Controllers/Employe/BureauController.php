<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BureauRequest;
use App\Models\Bureau;
use App\Models\Antenne;

class BureauController extends Controller
{
    public function create()
    {
        $antenne = Antenne::all();
        return view('bureau.create', compact('antenne'));
    }
    public function store(BureauRequest $request, Bureau $bureau)
    {
        try {
            $bureau->id_antenne = $request->id_antenne;
            $bureau->bureau = $request->bureau;

            $bureau->save();

            return redirect()->back()->with('success','Le bureau a été enregistré');

        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function liste()
    {
        $bureau = Bureau::all();

        return view('bureau.liste', compact('bureau'));

    }
    public function editer($bureau)
    {
        $bureau = Bureau::findOrFail($bureau);
        $antenne = Antenne::all();

        return view('bureau.edit',[
            'antenne'=> $antenne,
            'bureau'=> $bureau,
        ]);
    }
    public function update(Request $request, $bureau)
    {
        try {
            $bureau = Bureau::findOrFail($bureau);

            $bureau->bureau = $request->bureau;
            $bureau->id_antenne = $request->id_antenne;

            $bureau->update();

            return redirect()->route('bureau.liste')->with('success', 'Le bureau est mise à jour');
        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de la mise à jour", 1);

        }
    }
    public function delete($bureau)
    {
        $bureau = Bureau::findOrFail($bureau);

        $bureau->delete();

        return redirect()->back()->with('success','Le bureau a été retiré avec succes');
    }
}
