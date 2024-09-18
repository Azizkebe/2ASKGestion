@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des contrats</h4>
                    @if (!empty($PermissionAdd))
                    <button class="btn btn-primary btn-round ms-auto">
                        <a href="{{route('fiche_contrat.create')}}" class="text-white"><i class="fa fa-plus"></i> Ajouter un contrat</a>
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
                        <th>Contrat de l'employe</th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Type de contrat</th>
                        <th  style="width: 10%">Debut du contrat</th>
                        <th  style="width: 10%">Fin du contrat</th>
                        <th>Commentaire</th>
                        @if (!empty($PermissionEdit) ||(!empty($PermissionAdd)))
                        <th style="width: 10%">Action</th>
                        @endif
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($fichecontrat as $contrat)
                            <tr>
                                <td>
                                    @if ($contrat->fichier_contrat)
                                    <div>
                                        <div style="height:80px;" class="client-logo">
                                        <a href="{{asset('storage/'.$contrat->fichier_contrat)}}">
                                            <img src="{{asset('icon/contrat.png')}}"
                                            title="contrat de {{$contrat->contrat->type_contrat}}" alt="contrat" class="w-100">
                                        </a>
                                        {{-- <a href="{{asset('storage/'.$contrat->fichier_contrat)}}">
                                        <img style="width:50px; height:50px;" src="{{asset('storage/'.
                                         $contrat->fichier_contrat)}}" alt="">
                                        </a> --}}
                                    </div>

                                    @endif
                                </td>
                                <td>{{$contrat->employe->prenom}}</td>
                                <td>{{$contrat->employe->nom}}</td>
                                <td>{{$contrat->contrat->type_contrat}}</td>
                                <td>{{$contrat->date_obtention_contrat}}</td>
                                @if ($contrat->date_fin_contrat)
                                    <td> {{$contrat->date_fin_contrat}}</td>
                                @else
                                    <td>{{$contrat->date_always}}</td>
                                @endif
                                <td>{{$contrat->commentaire}}</td>
                                <td>
                                    <div class="form-button-action">
                                        @if (!empty($PermissionEdit))
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        ><a href="{{route('fiche_contrat.editer', $contrat->id)}}"><i class="fa fa-edit"></i></a>
                                        </button>
                                        @endif
                                        @if (!empty($PermissionDel))
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-danger"
                                        data-original-title="Remove"
                                        ><a onclick="return confirm('Etes vous sure de vouloir supprimer la fiche du contrat')"
                                        href="{{route('fiche_contrat.delete',$contrat->id)}}" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
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
