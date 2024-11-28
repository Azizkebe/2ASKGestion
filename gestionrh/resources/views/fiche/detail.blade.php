@extends('layouts.website')
@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 ">Detail de la Fiche Technique</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('fiche.add')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Nouvelle demande</a>
            </div>
            {{-- @include('fiche.modal.valid') --}}
            <form method="POST" action="" enctype="multipart/form-data">
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
                </form>
                {{$fiche->active}}
                @if ($fiche->active == false)
                <form action="{{route('fiche.update_fiche',$fiche->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <ul class="nav nav-pills nav-fill">
                        <div>
                            <li class="nav-item">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Cloture la demande</button>
                            </li>
                        </div>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                         <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="mt-3 mb-3">
                                        <label for="">Veuillez joindre l'ordre de mission</label>
                                        <input type="file" name="file_ordre_mission" id="file_ordre_mission" class="form-control">
                                </div>
                                <div class="mt-3 mb-3">
                                        <label for="">Commentaire</label>
                                    <textarea name="commentaire" id="comment" cols="15" rows="5" class="form-control"></textarea>
                                </div>
                        </div>
                    </div>
                    <div class="mt-3 mb-3">
                        <button type="submit" class="btn btn-success">Repondre à la demande</button>
                    </div>
                </form>
                 @endif
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection
