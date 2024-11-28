@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des demandes d'ordre de mission</h4>
                </div>

                {{-- @include('fiche.modal.valid') --}}
                {{-- @include('mission.modal.transfert') --}}
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
                            <th>Objet</th>
                            <th>Destination</th>
                            <th class="w-100">  Date de depart  </th>
                            <th>Date de retour</th>
                            <th>Type de mission</th>
                            <th>Moyen de transport</th>
                            <th>Frais à la charge</th>
                            <th>Statut</th>
                            <th>Objectif</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                            </thead>
                                <tbody>
                                @forelse ($fiche as $fiche)
                                <tr>
                                    <td>{{$fiche->id}}</td>
                                    <th>{{$fiche->user->employe->prenom}} {{$fiche->user->employe->nom}}</th>
                                    <td>{{$fiche->objet}}</td>
                                    <td>{{$fiche->destination}}</td>
                                    <td class="w-100">{{$fiche->date_depart}}</td>
                                    <td>{{$fiche->date_retour}}</td>
                                    <td>{{$fiche->typemission->type_mission}}</td>
                                    <td>{{$fiche->moyentransport->moyen_transport}}</td>
                                    <td>{{$fiche->frais}}</td>
                                    <td>
                                        {{$fiche->etat_statut_demande_mission->statut_demande_mission ?? 'En cours'}}
                                    </td>
                                    <td>
                                        <div>{{$fiche->objectif}}</div>
                                    </td>
                                    <td>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit"
                                        >
                                        <a href="{{route('fiche.detail', $fiche->id)}}" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
                                        </button>
                                    </td>
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
{{-- <script>
    $(document).ready(function(){
             $(".FicheTechniqueModal").click(function(){

        var detail_id =  $(this).attr('data-bs-id');
        $.ajax({
        id:{detail_id},
        url:"{{route('fiche.find')}}",
        type:"GET",
        data:{id:detail_id},
        success:function(data){
            var fiche = data.donnees;
            console.log(data);
            $('#detail_id').val(fiche[0]['id']);
        }
        });

        });
        $("#FicheValid").submit(function(){

            var formData = $(this).serialize();
            alert(formData);
            $.ajax({
                url:"{{route('fiche.update_fiche')}}",
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
</script> --}}
@endsection
