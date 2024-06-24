@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Validation du Compte</h4>
            <div>
                @if (session('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">x</button>
                        {{session('success')}}
                    </div>
                @endif
            </div>
            <form action="{{route('submitaccessdefine', $email)}}" method="POST">
                @csrf
                @method('POST')

              <div class="form-group input-group">
                <input name="email" class="form-control" placeholder="Email address" type="email" value="{{$email}}" readonly>
                <div class="input-group">
                    @error('email')
                     <span class="error">{{$message}}</span>
                    @enderror
                </div>
            </div>
              <div class="form-group input-group">
                <input name="password" class="form-control" placeholder="Mot de Passe" type="password">
                <div class="input-group">
                    @error('password')
                     <span class="error">{{$message}}</span>
                    @enderror
                </div>
             </div>
             <div class="form-group input-group">
                <input name="confirm_password" class="form-control" placeholder="Confirmation du mot de passe" type="password">
                <div class="input-group">
                    @error('confirm_password')
                     <span class="error">{{$message}}</span>
                    @enderror
                </div>
             </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Validation du Compte  </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
