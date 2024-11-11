@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des Voitures</h4>
                    <button class="btn btn-primary btn-round ms-auto">
                        <a href="{{route('voiture.add')}}" class="text-white"><i class="fa fa-plus"></i> Nouvelle Voiture</a>
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
                        <th>Marque</th>
                        <th>Matricule</th>

                        <th style="width: 10%">Action</th>
                        <th>Status</th>
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($voiture as $voiture)
                            <tr>
                                <td>{{$voiture->marque}}</td>
                                <td>{{$voiture->matricule}}</td>
                                <td>
                                    <div class="form-button-action">
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        ><a href="{{route('voiture.edit', $voiture->id)}}"><i class="fa fa-edit"></i></a>

                                        </button>
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-danger"
                                        data-original-title="Remove"
                                        ><a onclick="return confirm('Etes vous sure de vouloir retirer la voiture ')"
                                        href="{{route('voiture.delete', $voiture->id)}}" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{route('status.active', $voiture->id)}}" class="btn {{$voiture->active == true ? 'btn-success' : 'btn-danger'}}">
                                        {{$voiture->active == true ? 'Disponible' : 'Non Disponible'}}
                                    </a>
                                    {{-- <div style="margin:5px;
                                    border:1 solid white;
                                    background-color:black;
                                    color:{{$voiture->active ? 'white' :'yellow'}};
                                    height:35px; font-size:14px;">
                                    {{$voiture->active == true ? 'Disponible' : 'Non Disponible'}}
                                    </div> --}}
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
