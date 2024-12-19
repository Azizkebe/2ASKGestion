<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PanierArticle;
use App\Models\Fourniture;
use App\Models\Article;

class PanierArticleController extends Controller
{
    public $nbr_tentative = 0;
    public function editer(Request $request)
    {

        $panier = PanierArticle::where('id', $request->id)->get();

        $article = Article::all();
        $articleid = Article::findorFail($request->id);
        return response()->json(['panier'=>$panier,'article'=>$article,'articleid'=>$articleid]);

    }
    public function add(Request $request)
    {
        $panier = new PanierArticle;
        $panier->id_article = $request->id_article;
        $panier->id_fourniture = $fourniture;
        $panier->Quantite_demandee = $request->quantite_demande;

        $panier->save();
        toastr()->success('L\'article est ajouté avec succes');
        return redirect()->back();

    }
    public function update(Request $request)
    {
        // dd($request);
        // $panier = PanierArticle::findOrFail($request->id);
        // $panier->id_article = $request->id_article;
        // $panier->Quantite_demandee = $request->qte_demande;

        // $panier->save();

        return response()->json(['success'=>true,'msg'=>$request]);
    }

    public function delete(int $panier_article)
    {
        $panier = PanierArticle::findOrFail($panier_article);

        $panier->delete();

        toastr()->success('L\'article a été retiré avec succes');

        return redirect()->back();
    }

    public function article_accordee(Request $request, $panier_article)
    {
        $nbr_tentative = 1;
        $panier = PanierArticle::findOrFail($panier_article);
        if($panier->active == false)
        {
            $article = Article::where('id', $panier->id_article)->first();

            $fourniture = Fourniture::where('id', $panier->id_fourniture)->first();
            dd($fourniture);
            $result = $panier->update(['Quantite_accordee'=> $request->qte_accordee,'active'=> true]);

            if($result)
            {
                $article->update(['Quantite_restante'=> $article->Quantite_restante - $request->qte_accordee]);
                $panier->update(['statut_article'=>'2']);
                $fourniture->update(['id_etat_valid_comptable'=>'2']);

                toastr()->success('la quantite a été bien accordée');

                return redirect()->back();
            }
            else {
                toastr()->error('Impossible de modifier la quantite');
                return redirect()->back();
            }
        }
        else{

            toastr()->error('Desolé, vous avez déjà confirmé la quantite accordee');
            return redirect()->back();
        }


    }
}
