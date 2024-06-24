@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-auto">
            <h4 class="card-title mt-3 text-center">Creation Utilisateur</h4>
            <form action="{{route('handleregister')}}" method="POST">
                @csrf
                @method('POST')
              <div class="form-group input-group">
                <input name="surname" class="form-control" placeholder="Prenom" type="text">
                @error('surname')
                    <div class="error">{{$message}}</div>
                @enderror
            </div>
              <div class="form-group input-group">
                <input name="name" class="form-control" placeholder="Nom" type="text">
                @error('name')
                    <div class="error">{{$message}}</div>
                @enderror
                </div>
              <div class="form-group input-group">
                <input name="email" class="form-control" placeholder="Email address" type="email">
                @error('email')
                    <div class="error">{{$message}}</div>
                @enderror
            </div>
              <div class="form-group input-group">
                <input name="phone" class="form-control" placeholder="Telephone" type="number">
                @error('phone')
                    <div class="error">{{$message}}</div>
                @enderror
            </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Creer le Compte  </button>
              </div>
              <p class="text-center">
                <a href="">Voir la liste des comptes</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
