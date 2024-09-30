@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Editer le Profil</h4>
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
            <form action="{{route('update', $user->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group input-group">
                    <div class="input-group">
                        <select name="id_employe" id="id_employe" class="form-select">
                            <option value="">-- Choississez un role --</option>
                            @foreach ($employe as $employe)
                            <option {{$user->id_employe == $employe->id ? 'selected' : ''}} value="{{$employe->id}}">{{$employe->prenom}} {{$employe->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group input-group">
                    <div class="input-group">
                        <select name="role_id" id="role_id" class="form-select">
                            <option value="">-- Choississez un role --</option>
                            @foreach ($role as $role)
                            <option {{$user->role_id == $role->id ? 'selected' : ''}} value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
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
