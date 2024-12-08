@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 ">Nouvelle Fiche Technique</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('fiche.liste')}}" class="btn btn-success btn-sm">Liste des fiches techniques</a>
            </div>
            <form method="POST" action="{{route('fiche.store')}}">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col md-6">
                        <div class="mt-3">
                            <label for="">Objet</label>
                            <input type="text" name="objet" id="objet" class="form-control" value="{{old('objet')}}">
                            @error('objet')
                                <div class="error">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col md-9">
                                    <label for="">Date de depart</label>
                                    <input type="date" name="date_depart" id="date_depart" class="form-control" value="{{old('date_depart')}}">&nbsp;
                                    @error('date_depart')
                                        <div class="error">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="">Type de Mission</label>
                            <select name="id_type_mission" id="id_type_mission" value="{{'id_type_mission'}}" class="form-select">
                                <option value="">--Choisir le type de mission</option>
                                @foreach ($mission as $mission)
                                <option value="{{$mission->id}}">{{$mission->type_mission}}</option>
                                @endforeach
                            </select>
                            @error('id_type_mission')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>
                            <div class="mt-3">
                            <label for="">Frais à la charge</label><br>
                            <input type="radio" name="cadre" id="anpej" value="ANPEJ" checked> ANPEJ
                            <input type="radio" name="cadre" id="organisation" value="ORGANISATION"> ORGANISATION
                        </div>
                    </div>
                    <div class="col md-6">
                        <div class="mt-3">
                            <label for="">Destination</label>
                            <input type="text" name="destination" id="destination" class="form-control" value="{{old('destination')}}">
                            @error('destination')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col md-9">
                                    <label for="">Date de retour</label>
                                    <input type="date" name="date_retour" id="date_retour" class="form-control" value="{{old('date_retour')}}">
                                    @error('date_retour')
                                    <div class="error">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div><br>
                        <div class="mt-3">
                            <label for="">Moyen de Transport</label>
                            <select name="id_moyen_transport" id="id_moyen_transport" value="{{'id_moyen_transport'}}" class="form-select">
                                   <option value="">Choisir un moyen de transport</option>
                                    @foreach ($moyen as $moyen)
                                    <option value="{{$moyen->id}}">{{$moyen->moyen_transport}}</option>
                                    @endforeach
                               </select>
                            @error('id_moyen_transport')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="">Objectif</label><br>
                            <textarea name="objectif" id="objectif" cols="15" rows="5" class="form-control"></textarea>
                            @error('objectif')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-3 form-group">
                    <button type="submit" class="btn btn-success btn-block">Envoyer la fiche technique pour validation</button>
                    <button type="reset" class="btn btn-danger btn-block">Annuler</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
