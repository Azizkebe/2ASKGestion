<?php

namespace App\Http\Controllers\Fourniture;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FournitureRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailToAfterDemandeNotification;
use App\Notifications\SendEmailToResponseSupDemandeNotification;
use App\Notifications\SendEmailToAfterValidSupNotification;
use App\Notifications\SendEmailAfterResponseComptableNotification;
use App\Notifications\SendEmailAfterResponseComptableSupNotification;
use App\Models\Projet;
use App\Models\Article;
use App\Models\Fourniture;
use App\Models\DetailFourniture;
use App\Models\PanierArticle;
use App\Models\DemandeFourniture;
use App\Models\User;
use App\Models\EtatDemande;
use App\Models\EtatValidMagasin;
use App\Models\RoleModel;
use Auth;

class FournitureController extends Controller
{
    public $error;
    public $rejet;
    public function liste()
    {

        $fourniture =Fourniture::where('user_id', Auth::user()->id)->get();

        $etat = EtatDemande::all();

        return view('fourniture.liste',[
            'fourniture'=>$fourniture,
            'etat'=>$etat,

        ]);
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
        if($fourni['id_etat_demande'] == '1' || $fourni['id_etat_demande'] == '2' || $fourni['id_etat_demande'] == '3')
        {
            $this->error = '1';
        }
        $article = Article::all();
        $panier = PanierArticle::where('id_fourniture',$fourniture )->get();

        return view('fourniture.detail', [
            'fourni'=> $fourni,
            'article'=> $article,
            'panier'=> $panier,
            'error'=> $this->error,


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

        $user = Auth::user();

        // dd($user->employe->service->employe);
        // $userid = $user->id;
        // $fourniture = Fourniture::where('user_id','=',$userid)->first();

        $data = PanierArticle::where('id_fourniture',$fourniture)->get();

        if($data->count() >= 1)
        {

        $four = Fourniture::where('id','=',$fourniture)->first();

        $four->update(['id_validateur'=> $user->employe->service->id_chef_service,
         'id_etat_demande'=>'1']);

        if($four)
        {
            $messages['prenom'] = $user->employe->service->employe->prenom;
            $messages['nom'] = $user->employe->service->employe->nom;

            Notification::route('mail', $user->employe->service->employe->email)->notify(
                new SendEmailToAfterDemandeNotification($messages)
            );

            toastr()->success('la demande est envoyée pour validation avec succes');
            return redirect()->back();
        }
        else{
            toastr()->error('Impossible d\'envoyer la demande');
            return redirect()->back();
        }

        }
        else{

            toastr()->error('Aucune demande trouvée');
            return redirect()->back();
        }
    }
    public function validation()
    {
        // dd(Auth::user()->id_employe);

        $fourniture = Fourniture::where('id_validateur', Auth::user()->id_employe)
                                ->orWhere('id_user_comptable', Auth::user()->id_employe)->get();

        $etat = EtatDemande::all();
        return view('fourniture.validation',[
            'fourniture'=>$fourniture,
            'etat'=>$etat,
        ]);
    }
    public function edit($fourniture)
    {
      $com_fourniture = Fourniture::findOrFail($fourniture);
      $etat = EtatDemande::all();
      return view('fourniture.validedit', [
        'com_fourniture'=>$com_fourniture,
        'etat'=>$etat,
      ]);

    }
    public function edit_validation($fourniture)
    {
        $com_fourniture = Fourniture::findOrFail($fourniture);
        $etat = EtatValidMagasin::all();

        return view('fourniture.editcomptable',[
            'com_fourniture'=>$com_fourniture,
            'etat'=>$etat,
        ]);

    }
    public function update_fourniture($fourniture, Request $request)
    {
        $com_fourniture = Fourniture::findOrFail($fourniture);
        try {

            $role_resp = RoleModel::where('name','Comptable Matieres')->first();
            $users_resp = User::where('role_id', $role_resp->id)->first();
            // dd($users_resp->employe->id);
            if($com_fourniture->id_etat_demande == '1')
            {
                $com_fourniture->id_etat_demande = $request->id_etat;
                $com_fourniture->commentaire = $request->commentaire;

                $confirm = $com_fourniture->update();

                if($confirm)
                {
                    $messages['prenom'] = $com_fourniture->user->employe->prenom;
                    $messages['nom'] = $com_fourniture->user->employe->nom;

                    Notification::route('mail', $com_fourniture->user->employe->email)->notify(
                        new SendEmailToResponseSupDemandeNotification($messages)
                    );
                        if($com_fourniture['id_etat_demande'] == '2')
                        {
                            $com_fourniture->update(['id_user_comptable'=> $users_resp->employe->id,'id_etat_valid_comptable'=> '1']);

                            $messages_resp['prenom'] = $users_resp->employe->prenom;
                            $messages_resp['nom'] = $users_resp->employe->nom;

                            Notification::route('mail', $users_resp->email)->notify(
                                new SendEmailToAfterValidSupNotification($messages_resp)
                            );
                        }
                        else
                        {
                            toastr()->error('Impossible de transferer la demande');
                            return redirect()->back();
                        }
                    toastr()->success('Bravo, vous avez repondu à la demande');
                    return redirect()->route('fourniture.validation');
                }
                else
                {
                    toastr()->error('Desolé, nous pouvons pas traiter la demande');
                    return redirect()->back();
                }

            }
            else
            {
                toastr()->error('Désolé, vous avez déjà repondu à la demande');
                return redirect()->route('fourniture.validation');
            }

        } catch (Exception $e) {
            throw new Exception("Erreur lors de la validation", 1);

        }

    }
    public function update_validation($fourniture, Request $request)
    {
        $com_fourniture = Fourniture::findOrFail($fourniture);
        //  dd($request->id_etat);
        $com_fourniture->id_etat_valid_comptable = $request->id_etat;
        $com_fourniture->commentaire = $request->commentaire;

        $response = $com_fourniture->update();

        if($response)
        {
            $messages['prenom'] = $com_fourniture->user->employe->prenom;
            $messages['nom'] = $com_fourniture->user->employe->nom;

            $messages_resp['prenom'] = $com_fourniture->user_comptable->prenom;
            $messages_resp['nom'] = $com_fourniture->user_comptable->nom;

            Notification::route('mail', $com_fourniture->user->employe->email)->notify(
                new SendEmailAfterResponseComptableNotification($messages)
            );
            Notification::route('mail', $com_fourniture->user_comptable->email)->notify(
                new SendEmailAfterResponseComptableSupNotification($messages_resp)
            );


            toastr()->success('Bravo, vous avez repondu à la demande');
            return redirect()->route('fourniture.validation');
        }



    }

}
