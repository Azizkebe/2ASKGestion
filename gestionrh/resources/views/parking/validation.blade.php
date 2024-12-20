@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des demandes de vehicule pour validation</h4>
                </div>
                </div>
                <div class="card-body">

                    @include('parking.modal.metrage')

                    <div class="table-responsive">
                    <table
                        id="add-row"
                        class="display table table-striped table-hover"
                    >
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Demandeur</th>
                            <th>Motif</th>
                            <th>Destination</th>
                            <th class="w-100">  Date de depart  </th>
                            <th>Heure de depart</th>
                            <th>Date de retour</th>
                            <th>Heure de retour</th>
                            <th>Nombre de vehicule</th>
                            <th>Nombre de personne</th>
                            <th>Utilisation</th>
                            <th>Justificatif</th>
                            <th>Statut de validation du N+1</th>
                            <th>Statut de Validation du Chef de Park</th>
                            <th style="width: 10%">Action</th>
                            @if (!empty($valid_park))
                            <th>Metrage Retour</th>
                            @endif
                            {{-- <th>Faire une demande de carburant</th> --}}
                        </tr>
                            </thead>
                                <tbody>
                                @forelse ($parking as $park)
                                <tr>
                                    <td>{{$park->id}}</td>
                                    <th>{{$park->user->employe->prenom}} {{$park->user->employe->nom}}</th>
                                    <td>{{$park->motif}}</td>
                                    <td>{{$park->destination}}</td>
                                    <td class="w-100">{{$park->date_depart}}</td>
                                    <td>{{$park->heure_depart}}</td>
                                    <td>{{$park->date_retour}}</td>
                                    <td>{{$park->heure_retour}}</td>
                                    <td>{{$park->nombre_vehicule}}</td>
                                    <td>{{$park->nombre_personne}}</td>
                                    <td>{{$park->cadre}}</td>
                                    <td>
                                        <div>
                                            <a href="{{asset('storage/'.$park->cloud_file_demande_vehicule)}}" target="_blank">
                                                <img style="height: 40px; width:50px;" src="{{asset('storage/'.$park->cloud_file_demande_vehicule)}}"
                                                title="justificatif" alt="piece justificative" >
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        {{$park->etat_valid_vehicule->statut_valid_vehicule }}
                                    </td>
                                    <td>{{$park->etat_valid_sup->id_statut_validateur_sup ?? 'En cours'}}</td>
                                    <td>
                                        @if (!empty($valid_park))
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit"
                                        >
                                        <a href="{{route('parking.edit',$park->id)}}" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
                                        </button>
                                        @else
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit"
                                        >
                                        <a href="{{route('parking.reponse',$park->id)}}" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
                                        </button>
                                        @endif

                                    </td>
                                    <td>
                                        @if ((!empty($valid_park))&&($park->id_statut_validateur_sup == '2')&&($park->active == '1'))
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit"
                                        >
                                        <a href="" class="btn btn-link btn-primary btn-lg MetrageRetour" data-bs-toggle="modal" data-bs-target="#MetrageRetour" data-bs-id="{{$park->id}}"><i class="fa fa-plus"></i></a>

                                        </button>
                                        @endif
                                    </td>

                                    {{-- <td>
                                        <div class="form-button-action">
                                            @if ($park->id_statut_validateur == '2')
                                            <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title="Nouvelle demande de carburant"
                                            class="btn btn-link btn-black btn-lg"
                                            data-original-title="Edit Task">
                                            <a href="{{route('parking.demande_carburant', $park->id)}}" class="btn btn-link btn-primary btn-lg"><i class="fa fa-plus-circle"></i></a>
                                            </button>
                                            @endif
                                        </div>
                                    </td> --}}

                                    </tr>
                                @empty
                                    <td colspan="9">Aucune donnée trouvé</td>
                                @endforelse
                                </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".MetrageRetour").click(function(){
            var detail_id =  $(this).attr('data-bs-id');
            console.log(detail_id);
            $.ajax({
                id:{detail_id},
                url:"{{route('parking.edit_valid_metrage')}}",
                type:"GET",
                data:{id:detail_id},
                success:function(data){
                    var park = data.parking;
                    $('#detail_id').val(detail_id);
                    var metrage1 = $('#metrage_retour').val(park[0]['metrage_retour']);
                    var metrage1 = $('#metrage_depart').val(park[0]['metrage_depart']);

                }
            });
        });
        $('#storevalidMetrage').submit(function(){
        var formData = $(this).serialize();
        $.ajax({
        url:"{{route('parking.update_valid_metrage')}}",
        type:"POST",
        data:formData,
        success:function(data){
            console.log(data);
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
