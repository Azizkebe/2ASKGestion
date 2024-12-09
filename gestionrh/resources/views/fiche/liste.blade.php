@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des demandes d'ordre de mission</h4>

                </div>
                {{-- @include('mission.modal.suividemande')
                @include('mission.modal.transfert') --}}
                </div>
                <div class="card-body">
                    <div style="display: flex; justify-content:end;">
                        <a href="{{route('fiche.add')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Nouvelle Fiche Technique</a>
                    </div>
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
                            <th>Statut de validation du N+1</th>
                            <th>Statut de validation du RH</th>
                            <th>Objectif</th>
                            <th>Piece justificative</th>
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
                                        {{$fiche->statut_demande_OM->statut_demande_OM_Sup}}
                                    </td>
                                    <td>
                                        @if ($fiche->active == true)
                                        {{$fiche->etat_statut_demande_mission->statut_demande_mission}}
                                        @endif
                                    </td>
                                    <td>
                                        <div>{{$fiche->objectif}}</div>
                                    </td>
                                    <td>
                                        <div>
                                            @if($fiche->piece_justificative)
                                            <a href="{{asset('storage/'.$fiche->piece_justificative) ?? ''}}" target="_blank">
                                                <img style="height: 40px; width:50px;" src="{{asset('storage/'.$fiche->piece_justificative) ?? ''}}"
                                                title="justificatif" alt="piece justificative" >
                                            </a>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit"
                                        >
                                        <a href="{{route('fiche.consulte',$fiche->id)}}" class="btn btn-link btn-primary btn-lg" title="les details des informations"><i class="fa fa-eye"></i></a>
                                        </button>
                                    </td>
                                    <td>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title="Nouvelle demande de carburant"
                                        class="btn btn-link btn-black btn-lg"
                                        data-original-title="Edit Task">
                                        {{-- <a href="" class="btn btn-link btn-primary btn-lg OMValidModal" data-bs-toggle="modal" data-bs-target="#OMValidModal" data-bs-id="{{$mission->id}}"><i class="fa fa-eye"></i></a> --}}
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

@endsection
