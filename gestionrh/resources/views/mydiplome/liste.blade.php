@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des diplomes</h4>
                    <button class="btn btn-primary btn-round ms-auto">
                        <a href="{{route('mydiplome.create')}}" class="text-white"><i class="fa fa-plus"></i> Ajouter un diplome</a>
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
                        <th>Diplome</th>
                        <th>Commentaire</th>
                        <th>Date Obtention du diplome</th>
                        <th>Justificatif</th>

                        <th style="width: 10%">Action</th>
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($mydiplome as $mydiplome)
                            <tr>
                                <td>

                                    <div>

                                     <a href="{{asset('storage/'.$mydiplome->employe->photo->photo_employe)}}">
                                        <img style="width:50px; height:50px;" src="{{asset('storage/'.
                                         $mydiplome->employe->photo->photo_employe)}}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>{{$mydiplome->employe->prenom}}</td>
                                <td>{{$mydiplome->employe->nom}}</td>
                                <td>{{$mydiplome->typediplome->diplome_etude}}</td>
                                <td>{{$mydiplome->commentaire}}</td>
                                <td>{{$mydiplome->date_obtention_diplome}}</td>

                                @if ($mydiplome->diplome)
                                <td>
                                    <div>
                                        <a href="{{asset('storage/'.$mydiplome->diplome)}}">
                                            <img style="height: 40px;" src="{{asset('icon/diplome.png')}}"
                                            title="{{$mydiplome->typediplome->diplome_etude}}" alt="diplome" >
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
                                        ><a href="{{route('mydiplome.edit', $mydiplome->id)}}"><i class="fa fa-edit"></i></a>

                                        </button>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-danger"
                                        data-original-title="Remove"
                                        ><a onclick="return confirm('Etes vous sure de vouloir supprimer le diplome de l\'employe')"
                                        href="{{route('mydiplome.delete',$mydiplome->id)}}" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
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
