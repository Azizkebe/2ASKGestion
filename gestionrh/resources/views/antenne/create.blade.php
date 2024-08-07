@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Ajout une antenne</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('antenne.liste')}}" class="btn btn-success btn-sm">Liste des antennes</a>
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
            <form action="{{route('antenne.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group input-group">
                    <select name="id_direction" id="id_direction" class="form-select">
                        <option value="">--choisissez l'antenne--</option>
                        @foreach ($direction as $direction)
                            <option value="{{$direction->id}}">{{$direction->direction}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    @error('id_direction')
                        <span class="error">{{$message}}</span>
                    @enderror
                </div>
               <div class="form-group input-group">
                <input name="antenne" class="form-control" placeholder="antenne" type="text" value="{{old('antenne')}}">
                <div class="input-group">
                    @error('antenne')
                     <span class="error">{{$message}}</span>
                    @enderror
                </div>
                </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Ajouter une antenne  </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
