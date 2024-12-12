<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Group;
use App\Models\Projet;
use Carbon\Carbon;
use PDF;

class ArticleController extends Controller
{
    public function create()
    {
        $projet = Projet::all();
        $group = Group::all();

        return view('article.create', compact('group','projet'));
    }
    public function liste()
    {
        $group = Group::all();
        $article = Article::all();
        $projet = Projet::all();
        $projets = Projet::all();
        // dd($projets);

        return view('article.liste', compact('article','group','projet','projets'));
    }
    public function store(ArticleRequest $request, Article $article)
    {
        $mounthMapping = [
            'JAN'=>'JANVIER',
            'FEB'=>'FEVRIER',
            'MAR'=>'MARS',
            'APR'=>'AVRIL',
            'MAY'=>'MAI',
            'JUN'=>'JUIN',
            'JUL'=>'JUILLET',
            'AUG'=>'AOUT',
            'SEP'=>'SEPTEMBRE',
            'OCT'=>'OCTOBRE',
            'NOV'=>'NOVEMBRE',
            'DEC'=>'DECEMBRE',
        ];

        $currentMounth = strtoupper(Carbon::now()->format('M'));

        $currentMonthFrench = $mounthMapping[$currentMounth] ?? '';

        $article->name_article = $request->name_article;
        $article->Quantite_stock = $request->quantite_stock;
        $article->Quantite_restante = $request->quantite_stock;
        $article->prix_unitaire = $request->prix_unitaire;
        $article->id_group = $request->id_group;
        $article->id_projet = $request->id_projet;
        $article->mois = $currentMonthFrench;
        $article->annee = Carbon::now()->format('Y');

        $article->save();

        toastr()->success('Bravo, l\'article a été ajouté avec succes');

        return redirect()->route('article.liste');
    }
    public function editer(int $article)
    {
        $article = Article::findOrFail($article);
        $projet = Projet::all();
        $group = Group::all();
        return view('article.edit', compact('article','projet','group'));
    }
    public function update(Request $request, int $article)
    {
        $article = Article::findOrFail($article);

        $article->name_article = $request->name_article;

        $article->Quantite_stock = $request->quantite_stock;

        $article->prix_unitaire = $request->prix_unitaire;

        $article->id_group = $request->id_group;

        $article->id_projet = $request->id_projet;

        $article->update();

        toastr()->success('Bravo, L\'article est mise à jour');
        return redirect()->route('article.liste');
    }
    public function delete(int $article)
    {
        $article = Article::findOrFail($article);

        $article->delete();

        toastr()->success('L\'article a été retiré avec succes');

        return redirect()->back();

    }
    public function bon_entree(Request $request)
    {
        $group = Group::all();
        $currentYear = $request->annee;
        $mouth = $request->mois;
        $today = Carbon::now()->format('d');
        $info_grp = Article::where('id_group',$request->id_group)->first();
            $article = Article::where('annee',$currentYear)
                                ->Where('annee',$currentYear)
                                ->Where('id_group',$request->id_group)
                                ->Where('id_projet',$request->id_projet)
                                ->orWhere('mois',$mouth)
                                ->get();
            $pdf = PDF::loadView('article.bon_entree',compact('article','currentYear','mouth','today','group','info_grp'))->setPaper('a4','landscape');
            return $pdf->download('bon_entree_'.$mouth.' '.$currentYear.'.pdf');
            // return view('article.bon_entree', compact('article','currentYear','mouth','today','group','info_grp'));
    }
    public function bon_sortie(Request $request)
    {

        $group = Group::all();
        $currentYear = $request->annee;
        $mouth = $request->mois;
        $today = Carbon::now()->format('d');
        $info_grp = Article::where('id_group',$request->id_group)->first();
            $article = Article::where('annee',$currentYear)
                            ->Where('annee',$currentYear)
                            ->Where('id_group',$request->id_group)
                            ->Where('id_projet',$request->id_projet)
                            ->orWhere('mois',$mouth)
                            ->get();
            // dd($article);
            $pdf = PDF::loadView('article.bon_sortie',compact('article','currentYear','mouth','today','group','info_grp'))->setPaper('a4','landscape');
            return $pdf->download('bon_sortie_'.$mouth.' '.$currentYear.'.pdf');
            // return view('article.bon_sortie', compact('article','currentYear','mouth','today','group','info_grp'));
    }
}
