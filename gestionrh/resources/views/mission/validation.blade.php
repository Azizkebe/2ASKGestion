@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des demandes d'ordre de mission</h4>
                </div>
                @include('mission.modal.suividemande')
                @include('mission.modal.transfert')
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table
                        id="add-row"
                        class="display table table-striped table-hover"
                    >
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Demandeur</th>
                            <th>Activite</th>
                            <th>Destination</th>
                            <th class="w-100">  Date de depart  </th>
                            <th>Date de retour</th>
                            <th>Type de mission</th>
                            <th>Moyen de transport</th>
                            <th>Frais à la charge</th>
                            <th>Statut</th>
                            <th>Justificatif</th>
                            <th>Commentaire</th>
                            <th style="width: 10%">Action</th>
                            <th>Suivi Demande</th>
                            <th>Transmis à la DAFC</th>
                        </tr>
                            </thead>
                                <tbody>
                                @forelse ($mission as $mission)
                                <tr>
                                    <td>{{$mission->id}}</td>
                                    <th>{{$mission->user->employe->prenom}} {{$mission->user->employe->nom}}</th>
                                    <td>{{$mission->activite}}</td>
                                    <td>{{$mission->destination}}</td>
                                    <td class="w-100">{{$mission->date_depart}}</td>
                                    <td>{{$mission->date_retour}}</td>
                                    <td>{{$mission->typemission->type_mission}}</td>
                                    <td>{{$mission->moyentransport->moyen_transport}}</td>
                                    <td>{{$mission->frais}}</td>

                                    <td>
                                        {{$mission->etat_statut_demande_mission->statut_demande_mission ?? 'En cours'}}
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{asset('storage/'.$mission->justificatif)}}" target="_blank">
                                                <img style="height: 40px; width:50px;" src="{{asset('storage/'.$mission->justificatif)}}"
                                                title="justificatif" alt="piece justificative" >
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{$mission->commentaire}}</td>
                                    <td>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit"
                                        >
                                        <a href="{{route('ordre_mission.edit', $mission->id)}}" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
                                        </button>
                                    </td>
                                    <td>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title="Nouvelle demande de carburant"
                                        class="btn btn-link btn-black btn-lg"
                                        data-original-title="Edit Task">
                                        <a href="" class="btn btn-link btn-primary btn-lg OMValidModal" data-bs-toggle="modal" data-bs-target="#OMValidModal" data-bs-id="{{$mission->id}}"><i class="fa fa-eye"></i></a>
                                        </button>
                                    </td>
                                    @if ($mission->id_statut_demande_mission == '2')
                                    <td>
                                        <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title="Transmis à la DAFC"
                                            class="btn btn-link btn-black btn-lg"
                                            data-original-title="Edit Task">
                                            <a href="" class="btn btn-link btn-secondary btn-lg TransfertOMValidModal" data-bs-toggle="modal" data-bs-target="#TransfertOMValidModal" data-id="{{$mission->id}}"><i class="fa fa-paper-plane "></i></a>
                                        </button>
                                    </td>
                                    @endif
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
        $(".OMValidModal").click(function(){
                var detail_id =  $(this).attr('data-bs-id');
            $.ajax({
                id:{detail_id},
                url:"{{route('ordre_mission.suivi_validation')}}",
                type:"GET",
                data:{id:detail_id},
                success:function(data){
                    var mission = data.mission;
                    $('#detail_id').val(mission[0]['id']);
                    var comment = $('#comment').val(mission[0]['commentaire']);
                    var p_validateur = $('#p_validateur').val(mission[0]['user_validateur']['prenom']);
                    var n_validateur = $('#n_validateur').val(mission[0]['user_validateur']['nom']);
                    var statut = $('#statut').val(mission[0]['etat_statut_demande_mission']['statut_demande_mission']);
                }
            });
        });
        $(".TransfertOMValidModal").click(function(){
            var detail =  $(this).attr('data-bs-id');
            console.log(detail);
        });
    });
</script>
@endsection
