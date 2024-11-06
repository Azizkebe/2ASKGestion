@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 ">Nouvelle demande de vehicule</h4>
            <div style="display: flex; justify-content:end;">
                <a href="" class="btn btn-success btn-sm">Liste des vehicules</a>
            </div>
            <form method="POST" action="{{route('parking.store')}}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col md-6">
                        <div class="mt-3">
                            <label for="">Motif</label>
                            <input type="text" name="motif" id="motif" class="form-control">
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col md-9">
                                    <label for="">Date de depart</label>
                                    <input type="date" name="date_depart" id="date_depart" class="form-control">&nbsp;
                                </div>
                                <div class="col md-3">
                                    <label for="">Heure de depart</label>
                                    <input type="time" id="time_depart" name="time_depart" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="">Nombre de vehicule</label>
                            <input type="number" name="nombre_vehicule" id="nombre_vehicule" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="">Cadre</label><br>
                            <input type="radio" name="cadre" id="service" value="service"> Service
                            <input type="radio" name="cadre" id="personnel" value="personnel"> Personnel
                        </div>
                    </div>
                    <div class="col md-6">
                        <div class="mt-3">
                            <label for="">Destination</label>
                            <input type="text" name="destination" id="destination" class="form-control">
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col md-9">
                                    <label for="">Date de retour</label>
                                    <input type="date" name="date_retour" id="date_retour" class="form-control">
                                </div>
                                <div class="col md-3">
                                    <label for="">Heure de retour</label>
                                    <input type="time" name="time_retour" id="time_retour" class="form-control">
                                </div>
                            </div>
                        </div><br>
                        <div class="mt-3">
                            <label for="">Nombre de personne</label>
                            <input type="number" name="nombre_personne" id="nombre_personne" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="">Justificatif demande de vehicule</label><br>
                            <input type="file" name="piece_vehicule" id="piece_vehicule" class="form-control">
                        </div>
                    </div>
                </div>

              <div class="mt-3 form-group">
                <button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
                {{-- <a href="" type="submit" class="btn btn-primary btn-block"> Enregistrer</a>&nbsp;
                <a href="" class="btn btn-success btn-block">Envoyer pour validation</a>&nbsp;
                <a href="" type="reset" class="btn btn-danger btn-block">Annuler</a> --}}
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
