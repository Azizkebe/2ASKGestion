@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des Roles</h4>
                    @if(!empty($PermissionAdd))
                    <button class="btn btn-primary btn-round ms-auto">
                        <a href="{{route('role.create')}}" class="text-white"><i class="fa fa-plus"></i> Ajouter un role</a>
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
                        <th>Role</th>
                        <th>Date de Creation</th>
                        @if (!empty($PermissionEdit) || !empty($PermissionDel))
                        <th style="width: 10%">Action</th>
                        @endif
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($getRecord as $value)
                            <tr>
                                <td></td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->created_at}}</td>
                                <td>
                                    <div class="form-button-action">
                                        @if (!empty($PermissionEdit))
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        ><a href="{{route('role.editer',$value->id)}}"><i class="fa fa-edit"></i></a>
                                        </button>
                                        @endif

                                        @if (!empty($PermissionDel))
                                            <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-danger"
                                            data-original-title="Remove"
                                            ><a onclick="return confirm('Etes vous sure de vouloir supprimer le role')"
                                            href="{{route('role.delete',$value->id)}}" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                                            </button>
                                        @endif

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
