@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Ajout de Permission des vues</h4>
            <div>
                <a href="{{route('permissionrole.liste')}}" class="btn btn-sm btn-success float-end">Liste des Permissions des vues</a>
            </div>
            <form action="{{route('permissionrole.store')}}" method="POST">
                @csrf
                @method('POST')
               <div class="form-group input-group">
                <input name="nom" class="form-control" placeholder="nom" type="text" value="{{old('nom')}}">
                <div class="input-group">
                    @error('nom')
                     <span class="error">{{$message}}</span>
                    @enderror
                </div>
                </div>
                <div class="form-group input-group">
                    <input name="slug" class="form-control" placeholder="slug" type="text" value="{{old('slug')}}">
                    <div class="input-group">
                        @error('slug')
                         <span class="error">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group input-group">

                    <input name="groupby" class="form-control" placeholder="Groupby Ex: 1"  type="number" min="1" value="{{old('groupby')}}">
                    <div class="input-group">
                        @error('groupby')
                         <span class="error">{{$message}}</span>
                        @enderror
                    </div>
                </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Ajouter le nom de la permission  </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
