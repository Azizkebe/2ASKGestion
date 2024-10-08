@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste autorisation des permissions</h4>
                    <button class="btn btn-primary btn-round ms-auto">
                        {{-- <a href="{{route('demandepermission.create')}}" class="text-white"><i class="fa fa-plus"></i> Ajouter un domaine</a> --}}
                    </button>
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

                        <th>Date de depart</th>
                        <th>Date de retour</th>
                        <th>Nombre de jour souhaité</th>
                        <th>Motif de la demande</th>
                        <th>Nom du Chef Antenne</th>
                        <th>Statut de reponse du seperieur</th>
                        <th>Statut du RH</th>
                        <th style="width: 10%">Action</th>
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($demande_resp as $permission)
                            <tr>
                                <td></td>
                                <td>{{$permission->prenom}}</td>
                                <td>{{$permission->nom}}</td>
                                <td>{{$permission->email}}</td>

                                <td>{{$permission->date_depart}}</td>
                                <td>{{$permission->date_retour}}</td>
                                <td>{{$permission->nombre_jour}}</td>
                                <td>{{$permission->motif_demande}}</td>
                                <td>{{$permission->user->employe->prenom}} {{$permission->user->employe->nom}}</td>
                                <td>{{$permission->statut->statut_demande}}</td>
                                <td>{{$permission->statut_rh->statut_demande_rh}}</td>
                                <td>
                                    <div class="form-button-action">
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        ><a href="{{route('demande_resp.editer', $permission->id)}}"><i class="fa fa-edit"></i></a>

                                        </button>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-danger"
                                        data-original-title="Remove"
                                        ><a onclick="return confirm('Etes vous sure de vouloir supprimer la demande')"
                                        href="" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                                        </button>
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
