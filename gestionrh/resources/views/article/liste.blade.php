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
                    class="display table table-striped table-hover">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Nom de l'article</th>
                        <th>Quantite Stock Disponible</th>
                        <th>Prix Unitaire</th>
                        <th>Quantite de Stock restante</th>
                        <th>Projet</th>
                        <th>Groupe</th>
                        <th>Mois Enregistrement</th>
                        <th>Annee Enregistrement</th>

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
                                <td style="color:red;">{{$article->Quantite_restante ?? ''}}</td>
                                <td>{{$article->projet->name_projet ?? ''}}</td>
                                <td>{{$article->group->groupe ?? ''}}</td>
                                <td>{{$article->mois}}</td>
                                <td>{{$article->annee}}</td>
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
                                 <td colspan="8">Aucune donnée trouvée</td>
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
            <form action="{{route('article.bon_entree')}}" method="POST">
                @csrf
                <div class="mt-1">
                    <select name="mois" id="mois">
                        <option value="">--choisir le mois --</option>
                        <option value="JANVIER">JANVIER</option>
                        <option value="FEVRIER">FEVRIER</option>
                        <option value="MARS">MARS</option>
                        <option value="AVRIL">AVRIL</option>
                        <option value="MAI">MAI</option>
                        <option value="JUIN">JUIN</option>
                        <option value="JUILLET">JUILLET</option>
                        <option value="AOUT">AOUT</option>
                        <option value="SEPTEMBRE">SEPTEMBRE</option>
                        <option value="OCTOBRE">OCTOBRE</option>
                        <option value="NOVEMBRE">NOVEMBRE</option>
                        <option value="DECEMBRE">DECEMBRE</option>
                    </select>
                    <input type="text" name="annee" id="annee" placeholder="2024">
                    <div class="mt-3 mb-3">
                        <select name="id_group" id="id_group">
                            <option value="">-Choisir un groupe-</option>
                            @foreach ($group as $groupe)
                                <option value="{{$groupe->id}}">{{$groupe->groupe}}</option>
                            @endforeach
                        </select>
                        <select name="id_projet" id="projet">
                            <option value="">- Choisir un projet -</option>
                            @foreach ($projet as $projet)
                                <option value="{{$projet->id}}">{{$projet->name_projet}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Bon Entree</button>
                    </div>
                </div>

            </form>
        </div>
        <div class="col col-md-6">
            <div class="card-header">
                <h4 class="card-title">BON DE SORTIE</h4>
            </div>
            <form action="{{route('article.bon_sortie')}}" method="POST">
                @csrf
                <div class="mt-1">
                    <select name="mois" id="mois">
                        <option value="">--choisir le mois --</option>
                        <option value="JANVIER">JANVIER</option>
                        <option value="FEVRIER">FEVRIER</option>
                        <option value="MARS">MARS</option>
                        <option value="AVRIL">AVRIL</option>
                        <option value="MAI">MAI</option>
                        <option value="JUIN">JUIN</option>
                        <option value="JUILLET">JUILLET</option>
                        <option value="AOUT">AOUT</option>
                        <option value="SEPTEMBRE">SEPTEMBRE</option>
                        <option value="OCTOBRE">OCTOBRE</option>
                        <option value="NOVEMBRE">NOVEMBRE</option>
                        <option value="DECEMBRE">DECEMBRE</option>
                    </select>
                    <input type="text" name="annee" id="annee" placeholder="2024">
                    <div class="mt-3 mb-3">
                        <select name="id_group" id="id_group">
                            <option value="">-Choisir un groupe-</option>
                            @foreach ($group as $groupe)
                                <option value="{{$groupe->id}}">{{$groupe->groupe}}</option>
                            @endforeach
                        </select>
                        <select name="id_projet" id="id_projet">
                            <option value="">- Choisir un projet -</option>
                            @foreach ($projets as $projet)
                                <option value="{{$projet->id}}">{{$projet->name_projet}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-download"></i> Bon Sortie</button>

                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
