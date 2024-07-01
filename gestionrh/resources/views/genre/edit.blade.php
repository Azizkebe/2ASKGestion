@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Editer le Genre</h4>
            <div style="display: flex; justify-content:end;">
                <p><a href="{{route('genre.liste')}}" class="btn btn-success btn-sm">Liste du Genre</a></p>
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
            <form action="{{route('genre.update',$genre->id)}}" method="POST">
                @csrf
                @method('PUT')
               <div class="form-group input-group">
                <input name="sexe" class="form-control" placeholder="Masculin" type="text" value="{{$genre->name}}">
                </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Mettre à jour le genre  </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
