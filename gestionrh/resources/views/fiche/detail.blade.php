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
            @include('fiche.modal.valid')
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
                @if ($fiche->active == false)
                <div class="mt-3 form-group">
                    {{-- <button> --}}
                        <a href="" class=" text-white btn btn-primary btn-sm FicheTechniqueModal" data-bs-toggle="modal" data-bs-target="#FicheTechniqueModal" data-bs-id="{{$fiche->id}}">
                            Fermer la demande
                        </a>
                    {{-- </button> --}}
                </div>
                @endif
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
             $(".ValidOrdreMisionModal").click(function(){

                var detail_id =  $(this).attr('data-bs-id');

            $.ajax({
                    'id': {detail_id},
                    'url':"{{route('ordre_mission.edit_mission')}}",
                    'type':"GET",
                    'data':{id:detail_id},
                    success:function(data){
                        var mission = data.mission;
                        $('#comment').val(mission[0]['commentaire']);
                        $('#detail_id').val(mission[0]['id']);

                    }
                });
        });
        $("#StoreValidOrdreMission").submit(function(){

            var formData = $(this).serialize();
            // dd(formData);
            $.ajax({
                url:"{{route('ordre_mission.mission_store')}}",
                type:"POST",
                data:formData,
                success:function(data){

                    if(data.success == true){

                        location.reload();
                    }
                    else
                    {
                        alert(data.msg);
                    }
                }
            });

        });

    });
  </script>
@endsection
