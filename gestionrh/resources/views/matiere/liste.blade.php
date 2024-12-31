@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Liste des Matiere</h4>
                        <button class="btn btn-primary btn-round ms-auto">
                            <a href="{{route('matiere.create')}}" class="text-white"><i class="fa fa-plus"></i> Ajouter la nature des matieres</a>
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
                        <th>Nature des Matieres</th>

                        <th style="width: 10%">Action</th>
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($matiere as $matiere)
                            <tr>
                                <td>{{$matiere->id}}</td>
                                <td>{{$matiere->nature ?? ''}}</td>

                                <td>
                                    <div class="form-button-action">
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        >
                                        @if (!empty($autorise_edit))
                                        <a href="{{route('matiere.edit',$matiere->id)}}"><i class="fa fa-edit"></i></a>
                                        @endif

                                        </button>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-danger"
                                        data-original-title="Remove"
                                        >
                                        @if (!empty($autorise_delete))
                                        <a onclick="return confirm('Etes vous sure de vouloir retirer la matiere')"
                                        href="{{route('matiere.delete', $matiere->id)}}" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                                        @endif
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
