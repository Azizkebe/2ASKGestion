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
                            <th>Statut</th>
                            <th style="width: 10%">Action</th>
                            {{-- <th>Suivi demande</th> --}}
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
                                            <a href="{{asset('storage/'.$park->cloud_file_demande_vehicule)}}">
                                                <img style="height: 40px; width:50px;" src="{{asset('storage/'.$park->cloud_file_demande_vehicule)}}"
                                                title="justificatif" alt="piece justificative" >
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{$park->etat_valid_vehicule->statut_valid_vehicule }}</td>
                                    {{-- <td>
                                        <div class="form-button-action">
                                            <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-primary btn-lg"
                                            data-original-title="Edit Task">
                                            </button>
                                            <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-danger"
                                            data-original-title="Remove"
                                            >

                                            </button>

                                        </div>
                                    </td> --}}
                                    <td>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit"
                                        ><a href="{{route('parking.edit',$park->id)}}" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
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
