@extends('layouts.website')
@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 ">Detail de l'ordre de mission</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('ordre_mission.add')}}" class="btn btn-success btn-sm">Nouvelle demande</a>
            </div>
            @include('mission.modal.validmission')
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col md-6">
                        <div class="mt-3">
                            <label for="">Activite</label>
                            <input type="text" name="activite" id="activite" class="form-control" value="{{$mission->activite}}" readonly>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col md-9">
                                    <label for="">Date de depart</label>
                                    <input type="date" name="date_depart" id="date_depart" class="form-control" value="{{$mission->date_depart}}" readonly>&nbsp;
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="">Type de Mission</label>
                            <select name="id_type_mission" id="id_type_mission" class="form-select">
                                <option value="">--Choisir le type de mission</option>
                                @foreach ($type as $type)
                                    <option value="{{$type->id}}"{{ $type->id == $mission->type_mission ? 'selected' : ''}}>{{$type->type_mission}}</option>
                                @endforeach
                            </select>
                        </div>
                            <div class="mt-3">
                            <label for="">Frais à la charge</label><br>
                            <input type="radio" name="cadre" id="anpej" value="ANPEJ" {{ $mission->frais == 'ANPEJ' ? 'checked' : ''}}> ANPEJ
                            <input type="radio" name="cadre" id="organisation" value="ORGANISATION" {{ $mission->frais == 'ORGANISATION' ? 'checked' : ''}}> ORGANISATION
                        </div>
                    </div>
                    <div class="col md-6">
                        <div class="mt-3">
                            <label for="">Destination</label>
                            <input type="text" name="destination" id="destination" class="form-control" value="{{$mission->destination}}" readonly>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col md-9">
                                    <label for="">Date de retour</label>
                                    <input type="date" name="date_retour" id="date_retour" class="form-control" value="{{$mission->date_retour}}">
                                </div>
                            </div>
                        </div><br>
                        <div class="mt-3">
                            <label for="">Moyen de Transport</label>
                            <select name="id_type_mission" id="id_type_mission" class="form-select" readonly>
                                <option value="">--Choisir le type de mission</option>
                                @foreach ($moyen as $moyen)
                                    <option value="{{$moyen->id}}"{{ $moyen->id == $mission->moyen_transport ? 'selected' : ''}} readonly>{{$moyen->moyen_transport}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="">Justificatif de demande</label><br>
                            <div>
                                <a href="{{asset('storage/'.$mission->justificatif)}}" target="_blank">
                                    <img style="height: 15%; width:15%;" src="{{asset('storage/'.$mission->justificatif)}}"
                                    title="justificatif" alt="piece justificative" >
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @if (!empty($Validation_OM))
                <div class="mt-3 form-group">
                    <button type="button" class="btn btn-success btn-block">
                        <a href="{{route('ordre_mission.response', $mission->id)}}" class="m-r-15 text-white ValidOrdreMisionModal">
                            Repondre à la demande
                        </a>
                    </button>
                </div>
                @endif --}}
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
