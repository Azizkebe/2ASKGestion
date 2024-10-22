@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content d-flex-row text h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Statut du dossier</h4>
            <div>
                {{-- <a href="{{route('genre.liste')}}" class="btn btn-sm btn-success float-end">Liste des Genres</a> --}}
            </div>

            <form action="" method="POST">
                @csrf
                @method('POST')
                <div class="mt-3">
                    <label for=""><span class="error">*</span>Changement Statut...</label>
                    <select name="id_etat" id="id_etat" class="form-select">
                    <option value="">-- choisir un statut  --</option>
                    @foreach ($etat as $etat)
                        <option value="{{$etat->id}}" {{$etat->id == $com_fourniture->id_etat_demande ? 'selected': ''}}>{{$etat->statut_demande}}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="mt-3">
                    <label for="">Commentaire</label>
                    <textarea name="commentaire" id="commentaire" cols="15" rows="5" class="form-control"></textarea>
                  </div>
              <div style="display: flex; justify-content:center;" class="form-group">
                <button type="submit" class="btn btn-primary btn-round w-50"> Enregistrer </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
