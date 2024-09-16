@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100 row mb-3">
            <h4 class="card-title mt-3 text-center">Ajout de Role</h4>
            <div><br>
                <a href="{{route('role.liste')}}" class="btn btn-sm btn-success float-end">Liste des Genres</a>
            </div>
            <form action="{{route('role.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="row mb-3 mt-3">
                    <label style="text-align: left;" for="inputText" class="col-sm-12 col-form-control">Nom</label>
                    <div class="col-sm-12">
                        <input type="text" name="nom" placeholder="Nom" class="form-control" value="{{old('nom')}}">
                    </div>
                    <div class="input-group">
                        @error('nom')
                         <span class="error">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label style="text-align: left;
                    display:block; margin-bottom:20px;" for="inputText" class="col-sm-12 col-form-control">Permission</label>

                        @foreach ($result as $value)
                        <div style="margin-bottom: 20px; text-align:justify;" class="row">

                                <div style="text-align: left;" class="col-md-3">
                                    {{$value['name']}}
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        @foreach ($value['group'] as $group)
                                        <div class="col-md-4">
                                            <label for="">
                                                <input type="checkbox" value="{{$group['id']}}" name="permission_id[]"> {{$group['name']}}
                                            </label>

                                        </div>

                                        @endforeach
                                    </div>
                                </div>

                        </div>
                        <hr>
                        @endforeach

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Ajouter le role  </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
