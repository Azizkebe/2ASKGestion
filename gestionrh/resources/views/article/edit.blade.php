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
                  <label for="">Nom de l'article</label>
                  <input type="text" class="form-control" name="name_article" value="{{$article->name_article}}">
                </div>
                <div class="mt-3">
                    <label for="">Quantite de Stock</label>
                    <input type="number" name="quantite_stock" min="0" class="form-control" id="quantite_stock" value="{{$article->quantite_stock}}">
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
