@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
          <h4 class="card-title">Basic</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table
              id="basic-datatables"
              class="display table table-striped table-hover"
            >
              <thead>
                <tr>
                 <th> </th>
                  <th>Poste</th>

                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($poste as $poste)
                <tr>
                    <td> </td>
                    <td>{{$poste->poste}}</td>
                    <td>
                        <div class="form-button-action">
                            <button
                            type="button"
                            data-bs-toggle="tooltip"
                            title=""
                            class="btn btn-link btn-primary btn-lg"
                            data-original-title="Edit Task"
                            ><a href="{{route('poste.editer',$poste->id)}}"><i class="fa fa-edit"></i></a>

                            </button>
                            <button
                            type="button"
                            data-bs-toggle="tooltip"
                            title=""
                            class="btn btn-link btn-danger"
                            data-original-title="Remove"
                            ><a onclick="return confirm('Etes vous sure de vouloir supprimer le poste')"
                            href="{{route('poste.delete',$poste->id)}}" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                            </button>
                        </div>
                    </td>

                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
</div>
@endsection
