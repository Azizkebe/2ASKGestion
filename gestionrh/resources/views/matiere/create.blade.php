@extends('layouts.website')
@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Ajouter une matiere</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('matiere.liste')}}" class="btn btn-success btn-sm">Liste des matieres</a>
            </div>
            <form action="{{route('matiere.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="mt-3">
                  <label for="">Nom de la matiere</label>
                  <input type="text" class="form-control" name="nature">
                </div>
                <div>
                    @error('nature')
                        <span class="error">{{$message}}</span>
                    @enderror
                </div>

              <div style="display: flex; justify-content:center;" class="form-group">
                <button type="submit" class="btn btn-primary btn-block w-25"> Ajouter la matiere </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
