@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Editer un projet</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('projet.liste')}}" class="btn btn-success btn-sm">Liste des projets</a>
            </div>
            <form action="{{route('projet.update', $projet->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-3">
                  <label for="">Projet</label>
                  <input type="text" class="form-control" name="name_projet" value="{{$projet->name_projet}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Mettre à jour le projet  </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
