<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PanierArticle;
use App\Models\Fourniture;
use App\Models\Article;

class PanierArticleController extends Controller
{
    public function editer(Request $request)
    {

        $panier = PanierArticle::where('id', $request->id)->get();

        // $fourni = Fourniture::findOrFail($panier->id_fourniture);
        $article = Article::all();

        return response()->json(['panier'=>$panier,'article'=>$article]);
        // return view('fourniture.detail', [
        //     'panier'=>$panier,
        //     'fourni'=>$fourni,
        //     'article'=>$article,
        // ]);
        // return view('fourniture.modal.editmodal', [
        //     'article'=>$article,
        //     // 'panier_article'=>$panier_article,
        // ]);
    }
    public function update(int $panier_article)
    {
        $panier = PanierArticle::findOrFail($panier_article);

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
