@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center h-100">
      <div class="col-12 h-50 ">
        <div class="card shadow">
          <div class="card-body mx-100">
            <h4 class="card-title mt-3 text-center">Ajouter une demande de fourniture</h4>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('fourniture.liste')}}" class="btn btn-success btn-sm">Liste des articles</a>
            </div>
            <form action="{{route('fourniture.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="mt-3">
                  <label for=""><span class="error">*</span> Projet</label>
                  <select name="id_projet" id="id_projet" class="form-select">
                  <option value="">-- choississez le projet --</option>
                  @foreach ($projet as $projet)
                      <option value="{{$projet->id}}">{{$projet->name_projet}}</option>
                  @endforeach
                </select>
                </div>
                <div>
                    @error('id_projet')
                        <span class="error">{{$message}}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for=""><sup class="error">*</sup> Motif de la demande</label>
                    <input type="text" name="motif" class="form-control" id="motif">
                </div>
                <div>
                    @error('motif')
                        <span class="error">{{$message}}</span>
                    @enderror
                </div>
              <div class="mt-3 form-group">
                <button type="submit" class="btn btn-primary btn-block"> Ajouter l'article</button>&nbsp;&nbsp;
                <button type="reset" class="btn btn-danger btn-block"> Annuler</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
