@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des Curriculum Vitae</h4>
                    @if (!empty($PermissionAdd))
                    <button class="btn btn-primary btn-round ms-auto">
                        <a href="{{route('curriculum.create')}}" class="text-white"><i class="fa fa-plus"></i> Ajouter un curriculum</a>
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
                        <th>Commentaire</th>
                        <th>Date de la derniere mise à jour</th>
                        <th>Curriculum Vitea</th>
                        @if (!empty($PermissionEdit)||(!empty($PermissionDel)))
                        <th style="width: 10%">Action</th>
                        @endif
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($cv as $cv)
                            <tr>
                                <td>

                                    <div>

                                     <a href="{{asset('storage/'.$cv->employe->photo->photo_employe)}}">
                                        <img style="width:50px; height:50px;" src="{{asset('storage/'.
                                         $cv->employe->photo->photo_employe)}}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>{{$cv->employe->prenom}}</td>
                                <td>{{$cv->employe->nom}}</td>
                                <td>{{$cv->commentaire}}</td>
                                <td>{{$cv->date_mise_a_jour}}</td>

                                @if ($cv->curriculum)
                                <td>
                                    <div>
                                        {{-- <a href="{{asset('storage/'.$cv->curriculum)}}">
                                        <img style="width:50px; height:50px;" src="{{asset('storage/'.
                                         $cv->curriculum)}}" alt="">
                                        </a> --}}
                                        <a href="{{asset('storage/'.$cv->curriculum)}}">
                                            <img style="height: 40px;" src="{{asset('icon/cv.png')}}"
                                            title="{{$cv->commentaire}}" alt="CV" >
                                        </a>
                                    </div>
                                </td>


                                @endif

                                <td>
                                    <div class="form-button-action">
                                        @if (!empty($PermissionEdit))
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        ><a href="{{route('curriculum.edit', $cv->id)}}"><i class="fa fa-edit"></i></a>

                                        </button>
                                        @endif

                                        @if (!empty($PermissionDel))
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-danger"
                                        data-original-title="Remove"
                                        ><a onclick="return confirm('Etes vous sure de vouloir supprimer le CV de l\'employe')"
                                        href="{{route('curriculum.delete',$cv->id)}}" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
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
