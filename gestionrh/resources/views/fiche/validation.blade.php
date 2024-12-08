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
                            <th>Statut de validation du N+1</th>
                            @if (!empty($Validation_OM))
                            <th>Statut de validation RH</th>
                            @endif
                            <th>Objectif</th>
                            <th style="width: 10%">Action</th>
                            {{-- @if ($fiche->etat_statut_demande_mission->statut_demande_mission == '2') --}}
                            {{-- <th>Telecharger Ordre de Mission</th> --}}

                            {{-- @endif --}}
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
                                    @if (!empty($Validation_OM))
                                    <td>
                                    {{$fiche->etat_statut_demande_mission->statut_demande_mission}}
                                    </td>
                                    @endif
                                    <td>
                                        <div>{{$fiche->objectif}}</div>
                                    </td>
                                    @if ($fiche->id_statut_demande_OM_Sup == '1')
                                        <td>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit"
                                        >
                                        <a href="{{route('fiche_valid_sup.detail', $fiche->id)}}" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>

                                        </button>
                                    </td>
                                    @endif
                                    @if($fiche->id_statut_demande_OM_Sup != '2')
                                    {{-- <td>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit"
                                        >
                                        <a href="{{route('fiche.consulte', $fiche->id)}}" class="btn btn-link btn-primary btn-lg"><i class="fa fa-eye"></i></a>

                                        </button>
                                    </td> --}}

                                    @endif

                                    <td>
                                        @if (!empty($Validation_OM))
                                        <a href="{{route('fiche.detail', $fiche->id)}}" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
                                        @endif
                                    </td>
                                    {{-- <td>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit"
                                        >
                                        <a href="{{route('fiche.detail', $fiche->id)}}" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
                                        </button>
                                    </td> --}}
                                    <td>
                                        @if ($fiche->id_statut_demande_mission == '2')
                                        <a href="{{route('fiche.download', $fiche->id)}}" class="btn btn-link btn-secondary btn-lg"><i class="fa fa-download"></i></a>
                                        @endif
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
