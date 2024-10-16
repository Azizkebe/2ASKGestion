@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des Fournitures</h4>
                    <button class="btn btn-primary btn-round ms-auto">
                        <a href="{{route('fourniture.add')}}" class="text-white"><i class="fa fa-plus"></i> Ajouter une Fourniture</a>
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
                        <th>ID</th>
                        <th>Projet</th>
                        <th>Motif</th>
                        <th>Service</th>
                        <th>Etat</th>

                        <th style="width: 10%">Action</th>
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($fourniture as $demande)
                            <tr>
                                <td>{{$demande->id}}</td>
                                <td>{{$demande->projet->name_projet}}</td>
                                <td>{{$demande->motif}}</td>
                                <td>{{$demande->bureau}}</td>
                                <td>{{$demande->Etat ?? 'Nouvelle demande'}}</td>
                                <td>
                                    <div class="form-button-action">
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        ><a href="{{route('fourniture.detail', $demande->id)}}"><i class="fa fa-info"></i></a>
                                        </button>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        ><a href=""><i class="fa fa-edit"></i></a>
                                        </button>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-danger"
                                        data-original-title="Remove"
                                        ><a onclick="return confirm('Etes vous sure de vouloir supprimer la fourniture')"
                                        href="{{route('delete_fourniture.delete', $demande->id)}}" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                                        </button>
                                    </div>
                                </td>
                                </tr>
                             @empty
                                 <td colspan="5">Aucune donnée trouvé</td>
                             @endforelse
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
