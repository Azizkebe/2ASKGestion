@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Diplome d'etude</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('mondiplome.liste')}}" class="btn btn-success">Liste des diplomes</a>
            </div>
            <div>
                @if (session('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">x</button>
                        {{session('success')}}
                    </div>
                @endif
            </div>
            <form action="{{route('mondiplome.store')}}" method="POST">
                @csrf
                @method('POST')
               <div class="form-group input-group">
                <input name="diplome_etude" class="form-control" placeholder="Diplome d'etude" type="text" value="{{old('diplome_etude')}}">
                <div class="input-group">
                    @error('diplome_etude')
                     <span class="error">{{$message}}</span>
                    @enderror
                </div>
                </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Ajouter le diplome  </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
