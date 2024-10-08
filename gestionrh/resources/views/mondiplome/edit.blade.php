@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Editer un diplome</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('mondiplome.liste')}}" class="btn btn-success btn-sm">Liste des diplome</a>
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
            <form action="{{route('mondiplome.update', $diplome->id)}}" method="POST">
                @csrf
                @method('PUT')
               <div class="form-group input-group">
                <input name="diplome_etude" class="form-control" placeholder="diplome_etude" type="text" value="{{$diplome->diplome_etude}}">
                <div class="input-group">
                    @error('diplome_etude')
                     <span class="error">{{$message}}</span>
                    @enderror
                </div>
                </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Enregister les modificationsn du diplome  </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
