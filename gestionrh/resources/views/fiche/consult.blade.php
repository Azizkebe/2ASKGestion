@extends('layouts.website')
@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 ">Fiche Technique</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('fiche.liste')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Voir la liste</a>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col md-6">
                        <div class="mt-3">
                            <label for="">Objet</label>
                            <input type="text" name="objet" id="objet" class="form-control" value="{{$fiche->objet}}" readonly>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col md-9">
                                    <label for="">Date de depart</label>
                                    <input type="date" name="date_depart" id="date_depart" class="form-control" value="{{$fiche->date_depart}}" readonly>&nbsp;
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="">Type de Mission</label>
                            <select name="id_type_mission" id="id_type_mission" class="form-select">
                                <option value="">--Choisir le type de mission</option>
                                @foreach ($type as $type)
                                    <option value="{{$type->id}}"{{ $type->id == $fiche->type_mission ? 'selected' : ''}}>{{$type->type_mission}}</option>
                                @endforeach
                            </select>
                        </div>
                            <div class="mt-3">
                            <label for="">Frais à la charge</label><br>
                            <input type="radio" name="cadre" id="anpej" value="ANPEJ" {{ $fiche->frais == 'ANPEJ' ? 'checked' : ''}}> ANPEJ
                            <input type="radio" name="cadre" id="organisation" value="ORGANISATION" {{ $fiche->frais == 'ORGANISATION' ? 'checked' : ''}}> ORGANISATION
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="">Piece Justicative:</label>
                            <div>
                                @if($fiche->piece_justificative)
                                <a href="{{asset('storage/'.$fiche->piece_justificative) ?? ''}}" target="_blank">
                                    <img style="height: 40px; width:50px;" src="{{asset('storage/'.$fiche->piece_justificative) ?? ''}}"
                                    title="justificatif" alt="piece justificative" >
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col md-6">
                        <div class="mt-3">
                            <label for="">Destination</label>
                            <input type="text" name="destination" id="destination" class="form-control" value="{{$fiche->destination}}" readonly>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col md-9">
                                    <label for="">Date de retour</label>
                                    <input type="date" name="date_retour" id="date_retour" class="form-control" value="{{$fiche->date_retour}}" readonly>
                                </div>
                            </div>
                        </div><br>
                        <div class="mt-3">
                            <label for="">Moyen de Transport</label>
                            <select name="id_type_mission" id="id_type_mission" class="form-select" readonly>
                                <option value="">--Choisir le type de mission</option>
                                @foreach ($moyen as $moyen)

                                    <option value="{{$moyen->id}}"{{ $moyen->id == $fiche->moyen_transport ? 'selected' : ''}} @readonly(true)>{{$moyen->moyen_transport}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="">Objectif</label><br>
                            <div>
                                <textarea name="objectif" id="objectif" cols="15" rows="5" class="form-control" readonly>{{$fiche->objectif}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($fiche->id_statut_demande_OM_Sup != '1')
                <div class="row mt-3 mb-3">
                    <h4>Observation du superieur</h4>
                    <div class="mt-3">
                        <label for="">Statut Autorisation</label>
                        <select name="id_statut_OM" id="id_statut_OM" class="form-select">
                            <option value="">--Choisir un statut--</option>
                        @foreach ($statutOM as $statut)
                            <option value="{{$statut->id}}" {{ $statut->id == $fiche->id_statut_demande_OM_Sup ? 'selected' : ''}}>{{$statut->statut_demande_OM_Sup ?? ''}} </option>
                        @endforeach
                    </select>
                    </div>
                    <div class="mt-3">
                        <label for="">Commentaire</label>
                        <textarea name="comment" id="comment" cols="15" rows="5" class="form-control" readonly>{{$fiche->commentaire}}</textarea>

                    </div>
                </div>
                @endif
                {{-- @if ($fiche->active == true)
                <div class="row">
                    <div class="col col-md-6">
                        <div class="mt-3 mb-3">
                            <label for="">Voiture Attribuée</label>
                            <select name="id_vehicule" id="id_vehicule" class="form-select" readonly>
                                <option value="">--Choisir un vehicule --</option>
                                @foreach ($voiture as $voiture)
                                    <option value="{{$voiture->id}}"{{ $voiture->id == $fiche->id_vehicule ? 'selected' : ''}} @readonly(true)>{{$voiture->marque}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col col-md-6">
                        <div class="mt-3 mb-3">
                            <label for="">Commentaire Final</label>
                            <textarea name="" id="" cols="15" rows="5" class="form-control" readonly>{{$fiche->commentaire}}</textarea>
                        </div>
                    </div>
                </div>
                @endif --}}
                <div class="mt-3 mb-3">
                    <a href="{{route('fiche.liste')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Retour</a>
                </div>
               </form>
        </div>
    </div>
</div>
</div>
@endsection
