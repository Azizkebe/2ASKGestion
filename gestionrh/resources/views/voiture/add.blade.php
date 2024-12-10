@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center d-flex-row h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3">Ajout d'une nouvelle voiture</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('voiture.liste')}}" class="btn btn-success btn-sm">Liste des Voitures</a>
            </div>
            <form action="" method="POST">
                @csrf
                @method('POST')
               <div class="mt-3">
                    <label for="">Marque</label>
                    <input type="text" name="marque" id="marque" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="">Matricule</label>
                    <input type="text" name="matricule" id="matricule" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="">Type de Vehicule:</label>
                    <select name="id_type_vehicule" id="id_type_vehicule" class="form-select">
                        <option value="">-- Choississez le type de vehicule --</option>
                        @foreach ($type_vehicule as $type)
                            <option value="{{$type->id}}">{{$type->type_vehicule}}</option>
                        @endforeach
                    </select>
                    @error('id_type_vehicule')
                        <div class="error">{{$message}}</div>
                    @enderror
                </div>
              <div style="display: flex; justify-content:center;" class="mt-3 form-group">
                <button type="submit" class="btn btn-primary btn-block w-50">Enregistrer</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
