@extends('layouts.website')
@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 ">Nouvelle demande d'ordre de mission</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('ordre_mission.liste')}}" class="btn btn-success btn-sm">Liste des vehicules</a>
            </div>
            <form method="POST" action="{{route('ordre_mission.mission_store')}}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                <div class="mt-3 mb-3">
                    <label for="">Veuillez joindre l'ordre de mission</label>
                    <input type="file" name="file_ordre_mission" id="file_ordre_mission" class="form-control">
                    @error('file_ordre_mission')
                    <div class="error">{{$message}}</div>
                    @enderror
                </div>
                <div class="mt-3 mb-3">
                    <label for="">Commentaire:</label>
                        <textarea name="commentaire" id="comment" cols="15" rows="5" class="form-control" value=""></textarea>
                        @error('commentaire')
                            <div class="error">{{$message}}</div>
                        @enderror
                </div>
                </div>
                <div class="modal-footer1">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
