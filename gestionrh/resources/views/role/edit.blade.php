@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Editer le Role</h4>
            <div style="display: flex; justify-content:end;">
                <p><a href="{{route('role.liste')}}" class="btn btn-success btn-sm">Liste des Roles</a></p>
            </div>
            <form action="{{route('role.update',$role->id)}}" method="POST">
                @csrf
                @method('PUT')
               <div class="form-group input-group">
                <input name="nom" class="form-control"  type="text" value="{{$role->name}}">
                </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Mettre à jour le role </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
