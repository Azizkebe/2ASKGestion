<?php

namespace App\Http\Controllers\Fourniture;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FournitureRequest;
use App\Models\Projet;
use App\Models\Article;
use App\Models\Fourniture;
use App\Models\DetailFourniture;
use App\Models\PanierArticle;
use App\Models\User;
use Auth;

class FournitureController extends Controller
{
    public function liste()
    {
        $fourniture = Fourniture::all();
        return view('fourniture.liste', compact('fourniture'));
    }

    public function add()
    {
        $projet = Projet::all();
        return view('fourniture.add', compact('projet'));
    }
    public function store(FournitureRequest $request,Fourniture $fourni )
    {

       $fourni->id_projet = $request->id_projet;
       $fourni->motif = $request->motif;

       $fourni->save();

       toastr()->success('La fourniture est ajoutée');

       return redirect()->route('fourniture.detail', $fourni->id);
    }
    public function delete_fourniture($fourniture)
    {
        $fourni = Fourniture::findOrFail($fourniture);
        $fourni->delete();

        toastr()->success('la fourniture est supprimé avec succes');

        return redirect()->back();
    }
    public function detail(int $fourniture)
    {
        $fourni = Fourniture::findOrFail($fourniture);
        // $article = new Article;
        $article = Article::all();
        $panier = PanierArticle::all();

        return view('fourniture.detail', [
            'fourni'=> $fourni,
            'article'=> $article,
            'panier'=> $panier,
        ]);
    }
    public function store_detail(Request $request, PanierArticle $panier )
    {
        $user = Auth::user();
        $user_id = $user->id;

        $panier->user_id= $user_id;
        $panier->id_article = $request->id_article;
        $panier->Quantite_demandee = $request->quantite_demande;

        $panier->save();
        toastr()->success('L\'article est ajouté avec succes');
        return redirect()->back();

    }
    // public function editer_article(int $fourniture)
    // {
    //     $paniers = PanierArticle::where('id_fourniture',$fourniture)->first();
        // $fourni = Fourniture::findOrFail($fourniture);
        // $article = Article::all();
        // return view('fourniture.modal.editmodal',[
            // 'panier'=>$paniers,
            // 'fourni'=>$fourni,
            // 'article'=>$article,
        // ]);

    // }
    public function update_article(PanierArticle $panier, Request $requete, int $fourniture)
    {

        $panier = PanierArticle::where('id_fourniture', $fourniture)->first();
        $panier->id_article = $requete->id_article;
        $panier->Quantite_demandee = $requete->quantite_demandee;
        $panier->id_fourniture = $fourniture;

        $panier->update();

        toastr()->success('L\'article a été mise à jour');
        return redirect()->back();

    }
    // public function detail_save(Request $request, PanierArticle $panier_fourni)
    // {
    //     // $fourni = Fourniture::findOrFail($fourniture);

    //     $panier_fourni->id_article = $request->id_article;
    //     $panier_fourni->Quantite_demandee = $request->quantite_demande;

    //     $panier_fourni->save();

    //     toastr()->success('L\'article a été ajouté avec succes');
    //     return redirect()->back();
    // }
    public function delete(int $fourniture, DetailFourniture $detail_fourni)
    {
        $fourni_delete = DetailFourniture::findOrFail($fourniture);
        // $fourni_delete->delete();
        dd($fourni_delete);

        toastr()->success('L\'article a été retiré avec succes');
        return redirect()->back();
    }
    public function produit_article()
    {
        $article =  Article::all();
        return view('fourniture.modal.addmodal', compact('article'));
    }
    public function cash_fourniture()
    {
        $user = Auth::user();
        $userid = $user->id;

        $panier = PanierArticle::where('user_id', $userid)->get();
        dd($panier);
        $order = new DemandeFourniture;
        foreach($panier as $data)
        $order->user_id = $data->user_id;
        $order->Projet ;
        $order->Bureau ;
        $order->name_article = $data->article->name_article;
        $order->quantite_demande ;
    }
}
