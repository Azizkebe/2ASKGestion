@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Editer un poste</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('poste.liste')}}" class="btn btn-success btn-sm">Liste des postes</a>
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
            <form action="{{route('poste.update', $poste->id)}}" method="POST">
                @csrf
                @method('PUT')
               <div class="form-group input-group">
                <input name="poste" class="form-control" placeholder="poste" type="text" value="{{$poste->poste}}">
                <div class="input-group">
                    @error('poste')
                     <span class="error">{{$message}}</span>
                    @enderror
                </div>
                </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Enregister les modificationsn du poste  </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
