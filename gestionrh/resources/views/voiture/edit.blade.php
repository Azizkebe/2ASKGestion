@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center d-flex-row h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3">Editer les informations du vehicule</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('voiture.liste')}}" class="btn btn-success btn-sm">Liste des Voitures</a>
            </div>
            <form action="{{route('voiture.update', $voiture->id)}}" method="POST">
                @csrf
                @method('PUT')
               <div class="mt-3">
                    <label for="">Marque</label>
                    <input type="text" name="marque" id="marque" class="form-control" value="{{$voiture->marque}}">
                </div>
                <div class="mt-3">
                    <label for="">Matricule</label>
                    <input type="text" name="matricule" id="matricule" class="form-control" value="{{$voiture->matricule}}">
                </div>
              <div style="display: flex; justify-content:center;" class="mt-3 form-group">
                <button type="submit" class="btn btn-primary btn-block w-50">Mettre à jour les informations</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
