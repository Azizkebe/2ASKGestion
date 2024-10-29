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
        $article = Article::all();

        return response()->json(['panier'=>$panier,'article'=>$article]);

    }
    public function update(Request $request)
    {
        $panier = PanierArticle::findOrFail($request->id);

        dd($panier);
        $panier->id_article = $request->id_article;
        $panier->Quantite_demandee = $request->qte_demande;

        $panier->save();

        return response()->json(['success'=>true,'msg'=>'l\'article a été modifié avec success']);
    }

    public function delete(int $panier_article)
    {
        $panier = PanierArticle::findOrFail($panier_article);

        $panier->delete();

        toastr()->success('L\'article a été retiré avec succes');

        return redirect()->back();
    }
}
