@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Situation Matrimoniale</h4>
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
                <input name="matrimonial" class="form-control" placeholder="Situation Matrimoniale" type="text" value="{{old('matrimonial')}}">
                <div class="input-group">
                    @error('sexe')
                     <span class="error">{{$message}}</span>
                    @enderror
                </div>
                </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Ajouter la situation matrimoniale  </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
