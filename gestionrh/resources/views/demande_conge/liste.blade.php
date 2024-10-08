@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste de mes demandes de conges</h4>
                   {{-- @if (!empty($permissionDemandAdd)) --}}
                   <button class="btn btn-primary btn-round ms-auto">
                       <a href="{{route('demandepermission.create')}}" class="text-white"><i class="fa fa-plus"></i> Ajouter une demande de permission</a>
                   </button>
                   {{-- @endif --}}
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
                        <th></th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Type de conge</th>
                        <th>Destinataire</th>
                        <th>Date de depart</th>
                        <th>Date de retour</th>
                        <th>Nombre de jour souhaité</th>
                        <th style="width:50%;">Motif de la demande</th>
                        <th>Statut de la demande</th>
                        <th>Statut de validation du RH</th>
                        {{-- @if (!empty($permissionDemandEdit)|| (!empty($permissionDemandDel))) --}}
                        <th style="width: 10%">Action</th>
                        {{-- @endif --}}
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($demande_conge as $demande)
                            <tr>
                                <td></td>
                                <td>{{$demande->prenom}}</td>
                                <td>{{$demande->nom}}</td>
                                <td>{{$demande->email}}</td>
                                <td>{{$demande->param_type_conge->type_de_conge}}</td>
                                <td>{{$demande->user->employe->prenom}} {{$demande->user->employe->nom}}</td>
                                <td>{{$demande->date_depart}}</td>
                                <td>{{$demande->date_retour}}</td>
                                <td>{{$demande->nombre_jour_conge_pris}}</td>
                                <td>{{$demande->motif_demande_conge}}</td>
                                <td>
                                    {{$demande->statut->statut_demande}}
                                </td>
                                <td>
                                    {{$demande->statut_rh->statut_demande_rh ?? 'En attente'}}
                                </td>
                                <td>
                                    <div class="form-button-action">
                                        {{-- @if (!empty($permissionDemandEdit)) --}}
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        >
                                        <a href="{{route('demandeconge.editer',$demande->id )}}"><i class="fa fa-edit"></i></a>
                                        </button>
                                        {{-- @endif --}}
                                        {{-- @if (!empty($permissionDemandDel)) --}}
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-danger"
                                        data-original-title="Remove"
                                        >
                                        {{-- <a onclick="return confirm('Etes vous sure de vouloir supprimer le compte')"
                                        href="{{route('demandeconge.delete', $demande->id)}}" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a> --}}
                                        </button>
                                        {{-- @endif --}}
                                    </div>
                                </td>
                                </tr>
                             @empty
                                 <td colspan="10">Aucune donnée trouvé</td>
                             @endforelse
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
