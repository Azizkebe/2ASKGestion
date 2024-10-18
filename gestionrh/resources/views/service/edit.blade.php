@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Editer un service</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('service.create')}}" class="btn btn-success btn-sm">Liste des service</a>
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
            <form action="{{route('service.update', $service->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group input-group">
                    <select name="id_direction" id="id_direction" class="form-select">
                       <option value="">--Choisissez une direction--</option>
                        @foreach ($direction as $direction)

                       <option value="{{$direction->id}}" {{$direction->id === $service->id_direction ? 'selected' : ''}}>{{$direction->direction}}</option>
                       @endforeach
                    </select>
                </div>
                <div>
                    @error('id_direction')
                        <span class="error">{{$message}}</span>
                    @enderror
                </div>
               <div class="form-group input-group">
                <input name="service" class="form-control" placeholder="service" type="text" value="{{$service->service}}">
                <div class="input-group">
                    @error('service')
                     <span class="error">{{$message}}</span>
                    @enderror
                </div>
                </div>
                <div class="form-group input-group">
                    <select name="id_chef" id="id_chef" class="form-select">
                       <option value="">--Choisir un chef de service--</option>
                        @foreach ($employe as $employe)
                       <option value="{{$employe->id}}" {{$employe->id == $service->id_chef_service ? 'selected' : ''}}>{{$employe->prenom}} {{$employe->nom}}</option>
                       @endforeach
                    </select>
                </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Ajouter le service  </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
