<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    public function create()
    {
        return view('article.create');
    }
    public function liste()
    {
        $article = Article::all();
        return view('article.liste', compact('article'));
    }
    public function store(ArticleRequest $request, Article $article)
    {
        $article->name_article = $request->name_article;
        $article->Quantite_stock = $request->quantite_stock;
        $article->Quantite_restante = $request->quantite_stock;

        $article->save();

        toastr()->success('Bravo, l\'article a été ajouté avec succes');

        return redirect()->route('article.liste');
    }
    public function editer(int $article)
    {
        $article = Article::findOrFail($article);

        return view('article.edit', compact('article'));
    }
    public function update(Request $request, int $article)
    {
        $article = Article::findOrFail($article);

        $article->name_article = $request->name_article;

        $article->Quantite_stock = $request->quantite_stock;

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
}
