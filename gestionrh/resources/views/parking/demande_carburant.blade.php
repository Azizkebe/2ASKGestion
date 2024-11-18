@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 ">Demande de carburant</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('parking.liste')}}" class="btn btn-success btn-sm">Liste des vehicules</a>
            </div>

            <form method="POST" action="{{route('parking.carburant_update', $parking->id)}}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">

                        <div class="mt-3">
                            <label for="">Objet de la demande</label>
                            <input type="text" name="motif" id="motif" class="form-control" value="{{$parking->motif}}" readonly>
                            @error('motif')
                                <div class="error">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="">commentaire</label>
                            <textarea name="commentaire" id="commentaire" cols="15" rows="5" class="form-control" value="{{old('commentaire')}}" required></textarea>
                        </div>
                        <div class="mt-3 form-group">
                            <button type="submit" class="btn btn-success ">
                                    Envoyer la demande
                            </button>
                        </div>
                     </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
