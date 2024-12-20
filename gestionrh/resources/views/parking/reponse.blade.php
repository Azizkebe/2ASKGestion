@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 ">Reponse du Superieur à la demande de vehicule - {{$parking->user->employe->prenom}} {{$parking->user->employe->nom}}</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('parking.liste')}}" class="btn btn-success btn-sm">Liste des vehicules</a>
            </div>
            @include('parking.modal.valid')
            <form action="{{route('parking.update_reponse', $parking->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col md-6">
                        <div class="mt-3">
                            <input type="hidden" name="" id="detail_id" value="">
                        </div>
                        <div class="mt-3">
                            <label for="">Motif</label>
                            <input type="text" name="motif" id="motif" class="form-control" value="{{$parking->motif}}" readonly>
                            @error('motif')
                                <div class="error">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col md-9">
                                    <label for="">Date de depart</label>
                                    <input type="date" name="date_depart" id="date_depart" class="form-control" value="{{$parking->date_depart}}" readonly>&nbsp;
                                    @error('date_depart')
                                        <div class="error">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col md-3">
                                    <label for="">Heure de depart</label>
                                    <input type="time" id="time_depart" name="time_depart" class="form-control" value="{{$parking->heure_depart}}" readonly>
                                    @error('time_depart')
                                    <div class="error">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="">Nombre de vehicule</label>
                            <input type="number" name="nombre_vehicule" id="nombre_vehicule" min="0" class="form-control" value="{{$parking->nombre_vehicule}}" readonly>
                            @error('nombre_vehicule')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>
                            <div class="mt-3">
                            <label for="">Raison</label><br>
                            <input type="radio" name="cadre" id="service" value="service" {{ $parking->cadre == 'service' ? 'checked' : ''}} readonly> Service
                            <input type="radio" name="cadre" id="personnel" value="personnel" {{ $parking->cadre == 'personnel' ? 'checked' : ''}} readonly> Personnel
                        </div>
                    </div>
                    <div class="col md-6">
                        <div class="mt-3">
                            <label for="">Destination</label>
                            <input type="text" name="destination" id="destination" class="form-control" value="{{$parking->destination}}" readonly>
                            @error('destination')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col md-9">
                                    <label for="">Date de retour</label>
                                    <input type="date" name="date_retour" id="date_retour" class="form-control" value="{{$parking->date_retour}}" readonly>
                                    @error('date_retour')
                                    <div class="error">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col md-3">
                                    <label for="">Heure de retour</label>
                                    <input type="time" name="time_retour" id="time_retour" class="form-control" value="{{$parking->heure_retour}}" readonly>
                                    @error('time_retour')
                                    <div class="error">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div><br>
                        <div class="mt-3">
                            <label for="">Nombre de personne</label>
                            <input type="number" name="nombre_personne" id="nombre_personne" min="0" class="form-control" value="{{$parking->nombre_personne}}" readonly>
                            @error('nombre_personne')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>

                    </div>
                    @if ($parking->active_sup == '1')
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="mt-3">
                                <label for="">Statut de la reponse</label><br>
                                <select name="id_statut_reponse" id="id_statut_reponse" class="form-select">
                                    <option value="">-- Choisir un statut --</option>
                                    @foreach ($statut as $statut)
                                    <option value="{{$statut->id}}"{{ $statut->id == $parking->id_statut_validateur ? 'selected' : ''}}>{{$statut->statut_valid_vehicule}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="mt-3 mb-3">
                                <label for="">Commentaire</label>
                                <textarea name="commentaire" id="commentaire" cols="15" rows="4" class="form-control" readonly>{{$parking->commentaire}}</textarea>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @if ($parking->active_sup == '0')
                <div style="margin-right: 3px;" class="row mt-2">
                    <hr>
                    <h4 class="card-title mt-3 ">Observation du Superieur</h4>
                    <div class="col col-md-6">
                        <div class="mt-3 mb-3">
                            <label for="">Statut de la demande:</label>
                            <select name="id_statut_reponse" id="id_statut_reponse" class="form-select" required>
                                <option value="">-- Choisir un statut --</option>
                                @foreach ($statut as $statut)
                                    <option value="{{$statut->id}}">{{$statut->statut_valid_vehicule}}</option>
                                @endforeach
                            </select>
                            @error('id_statut_reponse')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="">Commentaire</label>
                            <textarea name="commentaire" id="commentaire" cols="15" rows="4" class="form-control"></textarea>
                            @error('commentaire')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col col-md-6">

                    </div>
                    <div class="mt-3 mb-3">
                        <button type="submit" class="btn btn-success">Repondre à la demande</button>
                    </div>
                </div>
                @else
                <div class="mt-3 form-group">
                        <a href="{{route('parking.liste')}}" class="m-r-15 btn btn-primary">
                            <i class="fa fa-arrow-left "></i>
                            Retour
                        </a>
                  </div>
                @endif

              {{-- <div class="mt-3 form-group">
                <button type="button" class="btn btn-success ">
                    <a href="" class="m-r-15 text-white ValidVehiculeModal" data-bs-toggle="modal" data-bs-target="#ValidVehiculeModal" data-bs-id="{{$parking->id}}">
                        Repondre à la demande
                    </a>
                </button>
              </div> --}}

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
            $(".ValidVehiculeModal").click(function(){
            var detail_id =  $(this).attr('data-bs-id');
            $.ajax({
            id:{detail_id},
            url:"{{route('parking.edit_valid')}}",
            type:"GET",
            data:{id:detail_id},
            success:function(data){
                var statut = data.etat;
                console.log(statut);
                var parking = data.parking;
                var user = data.user;
                var voiture = data.voiture;

                var html_voiture = "<option value=''>Choisir une voiture </option>";
                var html_user = "<option value=''>Choisir un chauffeur</option>";
                var htmlstatut = "<option value=''>Selectionner un statut </option>";
                $('#detail_id').val(parking[0]['id']);

                for(let i=0; i< statut.length; i++)
                {
                    if(parking[0]['id_statut_validateur'] == statut[i]['id']){
                        htmlstatut += `<option value="`+statut[i]['id']+`" selected>`+statut[i]['statut_valid_vehicule']+`</option>`;

                    }else{
                        htmlstatut += `<option value="`+statut[i]['id']+`">`+statut[i]['statut_valid_vehicule']+`</option>`;
                    }
                }
                for(let i=0; i< user.length; i++)
                {
                    if(parking[0]['id_chauffeur'] == user[i]['id'])
                    {
                        html_user += `<option value="`+user[i]['id']+`" selected>`+user[i]['employe']['prenom']+' '+user[i]['employe']['nom']+`</option>`;
                    }else
                    {
                        html_user += `<option value="`+user[i]['id']+`">`+user[i]['employe']['prenom']+' '+user[i]['employe']['nom']+`</option>`;

                    }

                }
                for(let i=0; i< voiture.length; i++)
                {
                    if(parking[0]['id_vehicule'] == voiture[i]['id'])
                    {
                        html_voiture += `<option value="`+voiture[i]['id']+`" selected>`+voiture[i]['marque']+`</option>`;
                    }else{
                        html_voiture += `<option value="`+voiture[i]['id']+`">`+voiture[i]['marque']+`</option>`;
                    }

                }

                var result = $("#edit_statut").html(htmlstatut);
                var result1 = $("#edit_chauffeur").html(html_user);
                var result2 = $("#edit_vehicule").html(html_voiture);
            }
            });
        });
        $("#storevalid").submit(function(){

        var formData = $(this).serialize();
        $.ajax({
            url:"{{route('parking.store_vehicule')}}",
            type:"POST",
            data:formData,
            success:function(data){

                if(data.success == true){

                    location.reload();
                }
                else{
                    alert(data.msg);
                    }
                }
            });

        });

    });
  </script>
@endsection
