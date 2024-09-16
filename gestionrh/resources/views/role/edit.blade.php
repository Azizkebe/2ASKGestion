@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Editer le Role</h4>
            <div style="display: flex; justify-content:end;">
                <p><a href="{{route('role.liste')}}" class="btn btn-success btn-sm">Liste des Roles</a></p>
            </div>
            <form action="{{route('role.update',$role->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3 mt-3">
                    <label style="text-align: left;" for="inputText" class="col-sm-12 col-form-control">Nom</label>
                    <div class="col-sm-12">
                        <input type="text" name="nom" placeholder="Nom" class="form-control" value="{{$role->name}}">
                    </div>
                    <div class="input-group">
                        @error('nom')
                         <span class="error">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label style="text-align: left;
                    display:block; margin-bottom:20px;" for="inputText" class="col-sm-12 col-form-control">Permission</label>

                        @foreach ($result as $value)

                        <div style="margin-bottom: 20px; text-align:justify;" class="row">

                                <div style="text-align: left;" class="col-md-3">
                                    {{$value['name']}}
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        @foreach ($value['group'] as $group)
                                                @php
                                                    $checked = '';
                                                @endphp
                                            @foreach ($getRolePermission as $rolepermission)

                                                @if ($rolepermission->permission_id == $group['id'])
                                                    @php
                                                        $checked = 'checked';
                                                    @endphp
                                                @endif
                                            @endforeach
                                        <div class="col-md-4">
                                            <label for="">
                                                <input type="checkbox" {{$checked}} value="{{$group['id']}}" name="permission_id[]"> {{$group['name']}}
                                            </label>

                                        </div>

                                        @endforeach
                                    </div>
                                </div>

                        </div>
                        <hr>
                        @endforeach

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Mettre à jour le role  </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
