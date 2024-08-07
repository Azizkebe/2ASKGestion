@extends('layouts.website')

@section('content')

<div>
    <div style="margin: auto;" class="card">
        <div class="card-header bg-primary">
            <div class="card-title text-white">Parametre des conges</div>
            <div style="display: flex; justify-content:end;">
                {{-- <a href="{{route('conge.liste')}}" class="btn btn-success btn-md"> Liste des Parametres define</a> --}}
            </div>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                @method('POST')


                <div class="mt-3">
                    <label for="type_conge">Le type de conge</label>
                    <select name="type_conge"  id="type_conge" name="type_conge" class="form-select">
                        <option value="">---choississez le type de statut ---</option>
                        @foreach ($typeconge as $type_conge)

                        <option value="{{$type_conge->id}}">{{$type_conge->type_conge}}</option>

                        @endforeach
                    </select>

                        @error('type_conge')
                        <div class="error">Precisez le type de conge</div>
                            @enderror
                    </div>
                    <div class="mt-3 form-group">
                        <label for="">Nombre de jour attribué</label>
                        <input type="number" id="nbre_jour_estime" name="nbre_jour_estime" value="0" min="0" class="form-control">
                    </div>
                </div>

                <div style="display: flex; justify-content:center" class="mb-3 mt-3">
                    <button type="submit" class="btn btn-primary"> Autoriser la permission</button>
                </div>

            </form>
    </div>
</div>

@endsection
