<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PanierArticle;
use App\Models\Fourniture;
use App\Models\Article;

class PanierArticleController extends Controller
{
    // public function editer(int $panier_article)
    // {
    //     $panier = PanierArticle::findOrFail($panier_article);
    //     $fourni = Fourniture::findOrFail($panier->id_fourniture);
    //     $article = Article::all();
    //     return view('fourniture.detail', [
    //         'panier'=>$panier,
    //         'fourni'=>$fourni,
    //         'article'=>$article,
    //     ]);
    // }
    public function update(int $panier_article)
    {
        $panier = PanierArticle::findOrFail($panier_article);
        // dd($panier);
        // return view('fourniture.detail', compact('panier'));
    }

    public function delete(int $panier_article)
    {
        $panier = PanierArticle::findOrFail($panier_article);

        $panier->delete();

        toastr()->success('L\'article a été retiré avec succes');

        return redirect()->back();
    }
}
