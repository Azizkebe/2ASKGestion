@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Creation Utilisateur</h4>
            <div>
                @if (session('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">x</button>
                        {{session('success')}}
                    </div>
                @endif
            </div>
            <form action="{{route('handleregister')}}" method="POST">
                @csrf
                @method('POST')
              <div class="form-group input-group">
                <input name="username" class="form-control" placeholder="Prenom" type="text" value="{{old('username')}}">
                <div class="input-group">
                    @error('username')
                     <span class="error">{{$message}}</span>
                    @enderror
                </div>
            </div>
              <div class="form-group input-group">
                <input name="name" class="form-control" placeholder="Nom" type="text" value="{{old('name')}}">
                <div class="input-group">
                    @error('name')
                     <span class="error">{{$message}}</span>
                    @enderror
                </div>
                </div>
              <div class="form-group input-group">
                <input name="email" class="form-control" placeholder="Email address" type="email" value="{{old('email')}}">
                <div class="input-group">
                    @error('email')
                     <span class="error">{{$message}}</span>
                    @enderror
                </div>
            </div>
              <div class="form-group input-group">
                <input name="phone" class="form-control" placeholder="Telephone" type="number" value="{{old('phone')}}">
                <div class="input-group">
                    @error('phone')
                     <span class="error">{{$message}}</span>
                    @enderror
                </div>
            </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Creer le Compte  </button>
              </div>
              <p class="text-center">
                <a href="{{route('listregister')}}">Voir la liste</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
