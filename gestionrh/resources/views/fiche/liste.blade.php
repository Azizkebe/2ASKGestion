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
                                @forelse ($fiche as $fiche)
                                <tr>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                    <td class="w-100"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="" target="_blank">
                                                <img style="height: 40px; width:50px;" src=""
                                                title="justificatif" alt="piece justificative" >
                                            </a>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit"
                                        >
                                        <a href="" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
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
