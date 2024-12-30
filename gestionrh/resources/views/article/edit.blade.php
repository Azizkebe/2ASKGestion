@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Editer un article</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('article.liste')}}" class="btn btn-success btn-sm">Liste des articles</a>
            </div>
            <form action="{{route('article.update', $article->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-3">
                    <label for="">Numero de l'article</label>
                    <input type="text" class="form-control" name="numero_article" id="numero_article" value="{{$article->numero_article}}">
                  </div>
                  <div>
                      @error('numero_article')
                          <span class="error">{{$message}}</span>
                      @enderror
                  </div>
                <div class="mt-3">
                  <label for="">Nom de l'article</label>
                  <input type="text" class="form-control" name="name_article" value="{{$article->name_article}}">
                </div>
                <div class="mt-3">
                    <label for="">Nature des matiere</label>
                    <select name="id_matiere" id="id_matiere" class="form-select">
                        <option value="">---Choisissez la nature --</option>
                        @foreach ($matiere as $matiere)
                            <option value="{{$matiere->id}}" {{$article->id_matiere == $matiere->id ? 'selected' : ''}}>{{$matiere->nature}}</option>
                        @endforeach
                    </select>
                  </div>
                <div class="mt-3">
                    <label for="">Quantite de Stock</label>
                    <input type="number" name="quantite_stock" min="0" class="form-control" id="quantite_stock" value="{{$article->Quantite_stock}}" readonly>
                </div>
                <div class="mt-3">
                    <label for="">Prix Unitaire</label>
                    <div>
                        <input type="number" name="prix_unitaire" id="prix_unitaire" min="0" value="{{$article->prix_unitaire}}" class="form-control">
                    </div>
                </div>
                <div class="mt-3 mb-3">
                    <label for="">Projet</label>
                    <select name="id_projet" id="id_projet" class="form-select">
                        <option value="">--Precisez le projet ---</option>
                            @foreach ($projet as $projet)
                                <option value="{{$projet->id}}"{{$projet->id == $article->id_projet ? 'selected' : ''}}>{{$projet->name_projet}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="mt-3 mb-3">
                    <label for="">Groupe d'article</label>
                    <select name="id_group" id="id_group" class="form-select">
                    <option value="">-- Veuillez le group d'appartenance ---</option>
                    @foreach ($group as $group)
                        <option value="{{$group->id}}"{{$group->id == $article->id_group ? 'selected' : ''}}>{{$group->groupe}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="mt-3 mb-3">
                    <label for="">Fournisseur</label>
                    <select name="id_fournisseur" id="id_fournisseur" class="form-select">
                    <option value="">-- Veuillez choisir le fournisseur ---</option>
                    @foreach ($fournisseur as $fourni)
                        <option value="{{$fourni->id}}"{{$fourni->id == $article->id_fournisseur ? 'selected' : ''}}>{{$fourni->name_fournisseur}}</option>
                    @endforeach
                    </select>
                    @error('id_fournisseur')
                        <div class="error">{{$message}}</div>
                    @enderror
                </div>
              <div style="display: flex; justify-content:center;" class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Mettre à jour l'article </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
