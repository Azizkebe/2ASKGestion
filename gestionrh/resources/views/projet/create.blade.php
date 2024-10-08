@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Ajout un projet</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('projet.liste')}}" class="btn btn-success btn-sm">Liste des projets</a>
            </div>
            <form action="{{route('projet.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="mt-3">
                  <label for="">Projet</label>
                  <input type="text" class="form-control" name="name_projet">
                </div>
                <div>
                    @error('name_projet')
                        <span class="error">{{$message}}</span>
                    @enderror
                </div>
              <div style="display: flex; justify-content:center;" class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Ajouter le projet  </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
