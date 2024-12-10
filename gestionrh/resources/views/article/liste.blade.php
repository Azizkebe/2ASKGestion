@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Liste des Articles</h4>
                        <button class="btn btn-primary btn-round ms-auto">
                            <a href="{{route('article.create')}}" class="text-white"><i class="fa fa-plus"></i> Ajouter un article</a>
                        </button>
                    </div>
                </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="add-row"
                    class="display table table-striped table-hover"
                  >
                    <thead>
                      <tr>
                        <th></th>
                        <th>Nom de l'article</th>
                        <th>Quantite Stock Disponible</th>
                        <th>Prix Unitaire</th>
                        <th>Projet</th>
                        <th>Groupe</th>
                        <th>Mois et Annee Enregistrement</th>

                        <th style="width: 10%">Action</th>
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($article as $article)
                            <tr>
                                <td></td>
                                <td>{{$article->name_article}}</td>
                                <td>{{$article->Quantite_stock}}</td>
                                <td>{{$article->prix_unitaire}} FCFA</td>
                                <td>{{$article->projet->name_projet ?? ''}}</td>
                                <td>{{$article->group->groupe ?? ''}}</td>
                                <td>{{$article->mois}} {{$article->annee}}</td>
                                <td>
                                    <div class="form-button-action">
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        ><a href="{{route('article.editer',$article->id)}}"><i class="fa fa-edit"></i></a>

                                        </button>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-danger"
                                        data-original-title="Remove"
                                        ><a onclick="return confirm('Etes vous sure de vouloir supprimer l\'article')"
                                        href="{{route('article.delete',$article->id)}}" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                                        </button>
                                    </div>
                                </td>
                                </tr>
                             @empty
                                 <td colspan="5">Aucune donnée trouvé</td>
                             @endforelse
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-6">
            <div class="card-header">
                <h4 class="card-title">BON D'ENTREE</h4>
            </div>
            <form action="">
                <div class="mt-1">
                    <input type="text" name="" id="" placeholder="JANVIER">
                    <input type="text" name="" id="" placeholder="2024">
                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Bon Entree</button>
                </div>

            </form>
        </div>
        <div class="col col-md-6">
            <div class="card-header">
                <h4 class="card-title">BON DE SORTIE</h4>
            </div>
            <form action="">
                <div class="mt-1">
                    <input type="text" name="" id="" placeholder="JANVIER">
                    <input type="text" name="" id="" placeholder="2024">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Bon Sortie</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
