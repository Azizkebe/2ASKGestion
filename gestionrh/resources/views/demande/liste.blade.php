@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des demandes de permission</h4>
                   @if (!empty($permissionDemandAdd))
                   <button class="btn btn-primary btn-round ms-auto">
                       <a href="{{route('demandepermission.create')}}" class="text-white"><i class="fa fa-plus"></i> Ajouter une demande de permission</a>
                   </button>
                   @endif
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
                        <th>Destinataire</th>
                        <th>Date de depart</th>
                        <th>Date de retour</th>
                        <th>Nombre de jour souhaité</th>
                        <th style="width:50%;">Motif de la demande</th>
                        <th>Statut de la demande</th>
                        <th>Statut de validation du RH</th>
                        @if (!empty($permissionDemandEdit)|| (!empty($permissionDemandDel)))
                        <th style="width: 10%">Action</th>
                        @endif
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($listepermissiondemande as $permission)
                            <tr>
                                <td></td>
                                <td>{{$permission->prenom}}</td>
                                <td>{{$permission->nom}}</td>
                                <td>{{$permission->email}}</td>
                                <td>{{$permission->user->employe->prenom}} {{$permission->user->employe->nom}}</td>
                                <td>{{$permission->date_depart}}</td>
                                <td>{{$permission->date_retour}}</td>
                                <td>{{$permission->nombre_jour}}</td>
                                <td>{{$permission->motif_demande}}</td>
                                <td>
                                    {{$permission->statut->statut_demande}}
                                </td>
                                <td>
                                    {{$permission->statut_rh->statut_demande_rh ?? 'En attente'}}
                                </td>
                                <td>
                                    <div class="form-button-action">
                                        @if (!empty($permissionDemandEdit))
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        ><a href="{{route('demandepermission.editer',$permission->id )}}"><i class="fa fa-edit"></i></a>
                                        </button>
                                        @endif
                                        @if (!empty($permissionDemandDel))
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-danger"
                                        data-original-title="Remove"
                                        ><a onclick="return confirm('Etes vous sure de vouloir supprimer le compte')"
                                        href="{{route('demandepermission.delete', $permission->id)}}" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                                        </button>
                                        @endif
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
