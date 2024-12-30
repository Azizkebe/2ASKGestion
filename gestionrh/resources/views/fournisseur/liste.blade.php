@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Liste des Fournisseurs</h4>
                        <button class="btn btn-primary btn-round ms-auto">
                            <a href="{{route('fournisseur.create')}}" class="text-white"><i class="fa fa-plus"></i> Ajouter un fournisseur</a>
                        </button>
                    </div>
                </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="add-row"
                    class="display table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nom du Fournisseur</th>
                        <th>Telephone du Fournisseur</th>
                        <th>Adresse du Fournisseur</th>
                        <th style="width: 10%">Action</th>
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($fournisseur as $fourni)
                            <tr>
                                <td>{{$fourni->id}}</td>
                                <td>{{$fourni->name_fournisseur ?? ''}}</td>
                                <td>{{$fourni->telephone ?? ''}}</td>
                                <td>{{$fourni->adresse ?? ''}}</td>

                                <td>
                                    <div class="form-button-action">
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
                                        ><a onclick="return confirm('Etes vous sure de vouloir retirer le fournisseur')"
                                        href="" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                                        </button>
                                    </div>
                                </td>
                                </tr>
                             @empty
                                 <td colspan="8">Aucune donnée trouvée</td>
                             @endforelse
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
