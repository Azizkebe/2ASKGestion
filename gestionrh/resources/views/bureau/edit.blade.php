@extends('layouts.website')
@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Editer un bureau</h4>
            <div style="display: flex;justify-content:end;">
                <a href="{{route('bureau.liste')}}" class="btn btn-success btn-sm"> Liste des bureaux</a>
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
            <form action="{{route('bureau.update', $bureau->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group input-group">
                    <select name="id_antenne" id="id_antenne" class="form-select">
                        <option value="">--Choisissez un bureau--</option>
                        @foreach ($antenne as $antenne)
                            <option value="{{$antenne->id}}" {{$antenne->id === $bureau->id_antenne ? 'selected' : ''}}>{{$antenne->antenne}}</option>
                        @endforeach
                    </select>
                </div>
               <div class="form-group input-group">
                <input name="bureau" class="form-control" placeholder="bureau" type="text" value="{{$bureau->bureau}}">
                <div class="input-group">
                    @error('bureau')
                     <span class="error">{{$message}}</span>
                    @enderror
                </div>
                </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Enregistrer les modifications du bureau  </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
