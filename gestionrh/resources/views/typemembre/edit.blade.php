@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Modifier le Type de Membre</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('typemembre.liste')}}" class="btn btn-success">Liste des Type de Membre</a>
            </div>
            <form action="{{route('typemembre.update', $type->id)}}" method="POST">
                @csrf
                @method('PUT')
               <div class="form-group input-group">
                <input name="type_membre" class="form-control" placeholder="Type de Membre " type="text" value="{{$type->type_membre}}">
                <div class="input-group">
                    @error('type_membre')
                     <span class="error">{{$message}}</span>
                    @enderror
                </div>
                </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Mettre à jour le type de membre  </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
