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
use App\Models\DemandeFourniture;
use App\Models\User;
use Auth;

class FournitureController extends Controller
{
    public function liste()
    {
        // $fourniture = Fourniture::all();
        $fourniture =Fourniture::where('user_id', Auth::user()->id)->get();

        return view('fourniture.liste', compact('fourniture'));
    }

    public function add()
    {
        $projet = Projet::all();
        return view('fourniture.add', compact('projet'));
    }
    public function store(FournitureRequest $request,Fourniture $fourni )
    {

       $user = Auth::user();
       $user_id = $user->id;
       $fourni->id_projet = $request->id_projet;
       $fourni->motif = $request->motif;
       $fourni->user_id = $user_id;
    //    $fourni->id_superieur = $user->employe->service->id_chef_service;
       $fourni->bureau = $user->employe->service->service;

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

        $article = Article::all();
        $panier = PanierArticle::where('id_fourniture',$fourniture )->get();

        return view('fourniture.detail', [
            'fourni'=> $fourni,
            'article'=> $article,
            'panier'=> $panier,
        ]);
    }
    public function store_detail(Request $request, PanierArticle $panier, int $fourniture )
    {
        $panier->id_article = $request->id_article;
        $panier->id_fourniture = $fourniture;
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

        dd($fourni_delete);

        toastr()->success('L\'article a été retiré avec succes');
        return redirect()->back();
    }
    public function produit_article()
    {
        $article =  Article::all();
        return view('fourniture.modal.addmodal', compact('article'));
    }
    public function cash_fourniture(int $fourniture )
    {
        // dd($fourniture);
        $user = Auth::user();
        // $userid = $user->id;
        // $fourniture = Fourniture::where('user_id','=',$userid)->first();

        $data = PanierArticle::where('id_fourniture',$fourniture)->get();

        if($data->count() >= 1)
        {

        $four = Fourniture::where('id','=',$fourniture)->first();

        $four->update(['id_validateur'=> $user->employe->service->id_chef_service, 'id_etat_demande'=>'1']);

        if($four)
        {
            toastr()->success('la demande est envoyée pour validation avec succes');
            return redirect()->back();
        }
        else{
            toastr()->error('Impossible d\'envoyer la demande');
            return redirect()->back();
        }

        }
        else{
            // dd('faux');
            toastr()->error('Aucune demande trouvée');
            return redirect()->back();
        }
        // $user = Auth::user();
        // $userid = $user->id;

        // $data = PanierArticle::where('user_id','=',$userid)->get();

        // if($data->count() >= 1)
        // {
        //     foreach($data  as $data)
        //     {
        //         $order = new DemandeFourniture();
        //         // $fourniture = Fourniture::

        //         $order->user_id = $data->user_id;
        //         $order->Projet = $data->fourniture->projet->name_projet ;
        //         $order->Motif = $data->fourniture->motif ;
        //         $order->Bureau = $data->bureau;
        //         $order->Article = $data->article->name_article;
        //         $order->Quantite_demandee = $data->Quantite_demandee;
        //         $order->Quantite_accordee = $data->Quantite_accordee;

        //         $order->save();

        //         $article_panier_id = $data->id;

        //         $article_panier = PanierArticle::find($article_panier_id);

        //         $article_panier->delete();
        //     }
        //     toastr()->success('la commande est envoyée pour validation avec succes');
        //     return redirect()->back();

        // }
        // else
        // {
        //     toastr()->error('Aucune demande trouvée');
        //     return redirect()->back();
        // }



    }

}
