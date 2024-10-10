<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PanierArticle;

class PanierArticleController extends Controller
{
    public function editer(int $panier_article)
    {
        $panier = PanierArticle::findOrFail($panier_article);

        dd($panier);
        return view('fourniture.detail', compact('article'));
    }

    public function delete(int $panier_article)
    {
        $panier = PanierArticle::findOrFail($panier_article);

        $panier->delete();

        toastr()->success('L\'article a été retiré avec succes');

        return redirect()->back();
    }
}
