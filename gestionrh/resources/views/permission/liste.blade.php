@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des Permissions</h4>
                    <button class="btn btn-primary btn-round ms-auto">
                        <a href="{{route('permission.create')}}" class="text-white"><i class="fa fa-plus"></i> Ajouter une Permission</a>
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
                        <th>Nom</th>
                        <th>Prenom</th>

                        <th>Date de Depart</th>
                        <th>Date de Retour</th>
                        <th>Justificatif</th>
                        <th>Nombre de Jours de permission</th>
                        <th>Nombre de jours restant</th>
                        <th>Deduction au congé</th>

                        <th style="width: 5%">commentaire</th>
                        <th style="width: 10%">Action</th>

                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($permission as $permission)
                            <tr>
                                <td>
                                    @if ($permission->employe->photo)
                                        <div style="background-image: url('{{asset('storage/'.
                                        $permission->employe->photo->photo_employe)}}');
                                        width:50px;
                                        height:50px;
                                        background-position:center;
                                        background-size:cover;
                                        ">
                                        </div>
                                    @endif
                                 </td>
                                <td>{{$permission->employe->nom}}</td>
                                <td>{{$permission->employe->prenom}}</td>
                                <td style="width: 20px;">{{$permission->date_depart}}</td>
                                <td style="width:20%; padding:(0px;">{{$permission->date_retour}}</td>
                                <td>
                                    @if ($permission->imagepermission)
                                    <a href="{{asset('storage/'.$permission->imagepermission->photo_permission)}}"><img
                                        style=" width:50px;
                                    height:50px;
                                    background-position:center;
                                    background-size:cover;"
                                        src="{{asset('storage/'.$permission->imagepermission->photo_permission)}}" alt="">
                                    </a>

                                @endif
                                </td>
                                <td>{{$permission->nombre_de_jour}}</td>
                                <td style="font-weight: bolder">{{$permission->employe->nombre_jour_permission}}</td>

                                <td>{{$permission->statutpermission->statut_permission ?? ''}}</td>
                                <td>{{$permission->commentaire}}</td>
                                {{-- <td>
                                    <div class="form-button-action">
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        >
                                        <a href="{{route('employe.detail',$employe->id)}}"><i class="fa fa-info"></i></a>

                                        </button>
                                    </div>
                                </td> --}}
                                <td>
                                    <div class="form-button-action">
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        >
                                        <a href="{{route('permission.editer',$permission->id)}}"><i class="fa fa-edit"></i></a>

                                        </button>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-danger"
                                        data-original-title="Remove"
                                        ><a onclick="return confirm('Etes vous sure de vouloir supprimer la permission')"
                                        href="{{route('permission.delete',$permission->id)}}" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                                        </button>
                                    </div>
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
