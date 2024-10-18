@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des Service</h4>
                    <button class="btn btn-primary btn-round ms-auto">
                        <a href="{{route('service.create')}}" class="text-white"><i class="fa fa-plus"></i> Ajouter un service</a>
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
                        <th>Direction</th>
                        <th>Service</th>
                        <th>Chef de Service</th>

                        <th style="width: 10%">Action</th>
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($service as $service)
                            <tr>
                                <td>{{$service->direction->direction}}</td>
                                <td>{{$service->service}}</td>
                                <td>{{$service->employe->prenom ?? ''}} {{$service->employe->nom ?? ''}}</td>
                                <td>
                                    <div class="form-button-action">
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        ><a href="{{route('service.editer',$service->id)}}"><i class="fa fa-edit"></i></a>

                                        </button>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-danger"
                                        data-original-title="Remove"
                                        ><a onclick="return confirm('Etes vous sure de vouloir supprimer le service')"
                                        href="{{route('service.delete',$service->id)}}" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
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
