@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des congés autorisés</h4>
                    <button class="btn btn-primary btn-round ms-auto">
                        <a href="{{route('permissionconge.create')}}" class="text-white"><i class="fa fa-plus"></i>Assigner un Congé</a>
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
                        <th>Type de congé</th>
                        <th>Nombre de jours pris</th>
                        <th>Nombre de jours restants</th>
                        <th style="width: 20px;">Date de Depart</th>
                        <th>Date de Retour</th>
                        <th>Justificative</th>
                        <th>Nombre de jours restants</th>

                        <th style="width: 10%">Action</th>
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($permissionlisteconge as $conge)
                            <tr>
                                <td>
                                @if ($conge->employe->photo)
                                    <div style="background-image: url('{{asset('storage/'.
                                    $conge->employe->photo->photo_employe)}}');
                                    width:50px;
                                    height:50px;
                                    background-position:center;
                                    background-size:cover;
                                    ">
                                    </div>
                                @endif
                                </td>
                                <td>{{$conge->employe->nom}}</td>
                                <td>{{$conge->employe->prenom}}</td>
                                <td>{{$conge->paramtypeconge->type_de_conge}}</td>
                                <td>{{$conge->nombre_jours_pris}} jour(s)</td>
                                <td>{{$conge->employe->nombre_conge_program}} jour(s)</td>
                                <td style="width: 210px;">{{$conge->date_depart}}</td>
                                <td style="width:5px;">{{$conge->date_retour}}</td>
                                <td>
                                @if ($conge->imageconge)
                                <a href="{{asset('storage/'.$conge->imageconge->photo_conge)}}">
                                    <img style="height: 40px;" src="{{asset('icon/permission.png')}}"
                                    title="permission de {{$conge->employe->nom}}" alt="permission" >
                                </a>
                                @endif
                                </td>
                                <td>
                                    <div class="form-button-action">
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        >
                                        <a href="{{route('permissionconge.editer', $conge->id)}}"><i class="fa fa-edit"></i></a>

                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-button-action">
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-danger"
                                        data-original-title="delete Task"
                                        >
                                        <a onclick="return confirm('Etes vous sure de vouloir supprimer le congé')" href="{{route('permissionconge.delete', $conge->id)}}"><i class="fa fa-trash"></i></a>

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
