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
                        <th>Numero de l'article</th>
                        <th>Nom de l'article</th>
                        <th>Nature des matieres</th>
                        <th>Quantite Stock Disponible</th>
                        <th>Prix Unitaire</th>
                        <th>Quantite de Stock restante</th>
                        <th>Projet</th>
                        <th>Groupe</th>
                        <th>Fournisseur</th>
                        <th>Date Enregistrement</th>

                        <th style="width: 10%">Action</th>
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($article as $article)
                            <tr>
                                <td></td>
                                <td>{{$article->numero_article ?? ''}}</td>
                                <td>{{$article->name_article}}</td>
                                <td>{{$article->matiere->nature ?? ''}}</td>
                                <td>{{$article->Quantite_stock}}</td>
                                <td>{{$article->prix_unitaire}} FCFA</td>
                                <td style="color:red;">{{$article->Quantite_restante ?? ''}}</td>
                                <td>{{$article->projet->name_projet ?? ''}}</td>
                                <td>{{$article->group->groupe ?? ''}}</td>
                                <td>{{$article->fournisseur->name_fournisseur ?? ''}}</td>
                                <td>{{$article->jour ?? '..'}} {{$article->mois ?? '..'}} {{$article->annee ?? '..'}}</td>
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
                    <input type="text" id="numero_article" name="numero_article" placeholder="Numero Article">
                    <select name="jour" id="jour">
                        <option value="">--choisir le jour --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
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
                    <div class="mt-1">

                        <input type="text" name="annee" id="annee" placeholder="2024">
                    </div>
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
                        <div class="mt-2 mb-2">
                            <select name="id_fournisseur" id="id_fournisseur">
                                <option value="">-- Choisir un fournisseur --</option>
                                @foreach ($fournisseur as $fournisseur)
                                    <option value="{{$fournisseur->id}}">{{$fournisseur->name_fournisseur}}</option>
                                @endforeach
                            </select>
                        </div>
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
                    <input type="text" id="numero_article" name="numero_article" placeholder="Numero Article">
                    <select name="jour" id="jour">
                        <option value="">--choisir le jour --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
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
                    <div class="mt-1">
                        <input type="text" name="annee" id="annee" placeholder="2024">
                    </div>
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
                        <div class="mt-2 mb-2">
                            <select name="id_fournisseur" id="id_fournisseur">
                                <option value="">-- Choisir un fournisseur --</option>
                                @foreach ($fournis as $fourni)
                                    <option value="{{$fourni->id}}">{{$fourni->name_fournisseur}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-download"></i> Bon Sortie</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
