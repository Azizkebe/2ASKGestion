@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Modifier les infos du profil</h4>
            <div>
                @if (session('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true"></button>
                        {{session('success')}}
                    </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true"></button>
                    {{session('success')}}
                </div>
                @endif
            </div>
            <form action="{{route('user.profil', $user->id)}}" method="POST">
                @csrf
                @method('PUT')

              <div class="form-group input-group">
                <input name="username" class="form-control" placeholder="Prenom" type="text" value="{{$user->employe->prenom}}">
             </div>
             <div class="form-group input-group">
                <input name="name" class="form-control" placeholder="Nom" type="text" value="{{$user->employe->nom}}">
             </div>
              <div class="form-group input-group">
                <input name="email" class="form-control" placeholder="Email address" type="email" value="{{$user->employe->email}}">
            </div>
            <div class="input-group">
                @error('email')
                 <span class="error">{{$message}}</span>
                @enderror
            </div>
              <div class="form-group input-group">
                <input name="phone" class="form-control" placeholder="Telephone" type="number" value="{{$user->employe->telephone}}">
            </div>
            <div class="input-group">
                @error('phone')
                 <span class="error">{{$message}}</span>
                @enderror
            </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Enregistrer les modifications </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
