@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Direction </h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('direction.liste')}}" class="btn btn-success btn-sm">Liste des directions</a>
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
            <form action="{{route('direction.store')}}" method="POST">
                @csrf
                @method('POST')
               <div class="form-group input-group">
                <input name="direction" class="form-control" placeholder="direction" type="text" value="{{old('direction')}}">
                <div class="input-group">
                    @error('direction')
                     <span class="error">{{$message}}</span>
                    @enderror
                </div>
                </div>
                <div class="form-group input-group">
                    <select name="id_chef_direction" id="id_chef_direction" class="form-select">
                       <option value="">--Choisir le chef de direction --</option>
                        @foreach ($employe as $chef)
                       <option value="{{$chef->id}}">{{$chef->prenom}} {{$chef->nom}}</option>
                       @endforeach
                    </select>
                </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Ajouter la direction  </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
