@extends('layouts.website')
@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Ajouter un Fournisseur</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('fournisseur.liste')}}" class="btn btn-success btn-sm">Liste des fournisseurs</a>
            </div>
            <form action="{{route('fournisseur.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="mt-3">
                  <label for="">Nom du fournisseur</label>
                  <input type="text" class="form-control" name="name_fournisseur">
                </div>
                <div>
                    @error('name_fournisseur')
                        <span class="error">{{$message}}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="">Telephone du Fournisseur</label>
                    <input type="number" name="telephone" min="0" class="form-control" id="telephone">
                </div>
                <div>
                    @error('telephone')
                        <span class="error">{{$message}}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="">Adresse</label>
                    <div>
                        <input type="texte" name="adresse" id="adresse" class="form-control">
                    </div>
                </div>
              <div style="display: flex; justify-content:center;" class="form-group">
                <button type="submit" class="btn btn-primary btn-block w-25"> Ajouter le fournisseur </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
