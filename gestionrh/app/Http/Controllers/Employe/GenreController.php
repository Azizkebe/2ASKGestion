<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GenreRequest;
use App\Models\Genre;

class GenreController extends Controller
{
    public function create()
    {
        return view('genre.create');
    }
    public function store(GenreRequest $request, Genre $genre)
    {
        try {
            $genre->name = $request->sexe;
            $genre->save();

            return redirect()->back()->with('success','le genre est ajouté avec succes');
        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function liste()
    {
        $genre = Genre::all();
        return view('genre.liste', compact('genre'));
    }
    public function editer($genre)
    {
        $genre = Genre::findOrFail($genre);

        return view('genre.edit',compact('genre'));
    }
    public function update(Request $request, $genre)
    {
        $genre = Genre::findOrFail($genre);

        $genre->name = $request->sexe;

        $genre->update();

        return redirect()->back()->with('success','La modification est effectuée avec succes');
    }
}
