@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des membres</h4>
                    <button class="btn btn-primary btn-round ms-auto">
                        <a href="{{route('membre.create')}}" class="text-white"><i class="fa fa-plus"></i> Ajouter un membre</a>
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
                        <th>Membre</th>
                        <th>Piece Justificative</th>

                        <th style="width: 10%">Action</th>
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($membre as $membre)
                            <tr>
                                <td>

                                    <div>

                                     <a href="{{asset('storage/'.$membre->employe->photo->photo_employe)}}">
                                        <img style="width:50px; height:50px;" src="{{asset('storage/'.
                                         $membre->employe->photo->photo_employe)}}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>{{$membre->employe->prenom}}</td>
                                <td>{{$membre->employe->nom}}</td>
                                <td>{{$membre->typemembre->type_membre}}</td>

                                @if ($membre->photo_justificative)
                                <td>
                                    <div>
                                        <a href="{{asset('storage/'.$membre->photo_justificative)}}">
                                        <img style="width:50px; height:50px;" src="{{asset('storage/'.
                                         $membre->photo_justificative)}}" alt="">
                                        </a>
                                    </div>
                                </td>


                                @endif

                                <td>
                                    <div class="form-button-action">
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        ><a href="{{route('membre.editer', $membre->id)}}"><i class="fa fa-edit"></i></a>

                                        </button>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-danger"
                                        data-original-title="Remove"
                                        ><a onclick="return confirm('Etes vous sure de vouloir supprimer la fiche du contrat')"
                                        href="{{route('membre.delete',$membre->id)}}" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
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
